<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        HasRoles,
        Impersonate,
        MustVerifyEmailTrait,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'email_verified_at',
        'password',
        'password_changed_at',
        'active',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'to_be_logged_out',
        'provider',
        'provider_id',
        'google2fa_secret',
        'google2fa_enabled',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',

    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
        'password_changed_at',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'to_be_logged_out' => 'boolean',
        'google2fa_enabled' => 'boolean',

    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
        'roles',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the registration verification email.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return bool
     */
    public function canImpersonate(): bool
    {
        return $this->can('admin.access.user.impersonate');
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return bool
     */
    public function canBeImpersonated(): bool
    {
        return ! $this->isMasterAdmin();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
    /**
     * Check if 2FA is enabled for this user
     */
    public function hasTwoFactorEnabled(): bool
    {
        return $this->google2fa_enabled;
    }

    /**
     * Enable 2FA for this user
     */
    public function enableTwoFactorAuth(string $secret): void
    {
        $this->google2fa_secret = $secret;
        $this->google2fa_enabled = true;
        $this->save();
    }

    /**
     * Disable 2FA and remove all recovery codes
     */
    public function disableTwoFactorAuth(): void
    {
        $this->google2fa_secret = null;
        $this->google2fa_enabled = false;
        $this->save();

        // Remove all recovery codes when disabling 2FA
        $this->recoveryCodes()->delete();
    }
    /**
     * Get recovery codes relationship
     */
    public function recoveryCodes()
    {
        return $this->hasMany(RecoveryCode::class);
    }

    /**
     * Generate new recovery codes for the user
     * This will invalidate all existing codes
     */
    public function generateRecoveryCodes(): array
    {
        // Delete all existing recovery codes
        $this->recoveryCodes()->delete();

        $codes = [];
        $plainCodes = [];

        // Generate 8 recovery codes
        for ($i = 0; $i < 8; $i++) {
            $plainCode = $this->generateRecoveryCode();
            $plainCodes[] = $plainCode;

            // Create recovery code record (code will be automatically hashed)
            $this->recoveryCodes()->create([
                'code' => $plainCode,
            ]);
        }

        // Return plain codes only once for user to save
        return $plainCodes;
    }

    /**
     * Get recovery codes with their usage status
     * Returns hashed codes with metadata, not plain codes
     */
    public function getRecoveryCodes(): array
    {
        return $this->recoveryCodes()
            ->select('id', 'used', 'used_at', 'created_at')
            ->orderBy('created_at')
            ->get()
            ->toArray();
    }

    /**
     * Get unused recovery codes count
     */
    public function getUnusedRecoveryCodesCount(): int
    {
        return $this->recoveryCodes()->unused()->count();
    }

    /**
     * Verify and use a recovery code
     */
    public function useRecoveryCode(string $code): bool
    {
        $recoveryCode = $this->recoveryCodes()
            ->unused()
            ->get()
            ->first(function ($recoveryCode) use ($code) {
                return $recoveryCode->matches($code);
            });

        if ($recoveryCode) {
            $recoveryCode->markAsUsed();
            return true;
        }

        return false;
    }

    /**
     * Check if user has any unused recovery codes
     */
    public function hasUnusedRecoveryCodes(): bool
    {
        return $this->recoveryCodes()->unused()->exists();
    }

    /**
     * Generate a single recovery code
     */
    private function generateRecoveryCode(): string
    {
        // Generate a 10-character alphanumeric code
        // Format: XXXXX-XXXXX for better readability
        $part1 = strtoupper(Str::random(5));
        $part2 = strtoupper(Str::random(5));

        return $part1 . '-' . $part2;
    }


}

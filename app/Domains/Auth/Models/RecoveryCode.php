<?php

namespace App\Domains\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

class RecoveryCode extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'used',
        'used_at',
    ];

    protected $casts = [
        'used' => 'boolean',
        'used_at' => 'datetime',
    ];

    /**
     * Get the user that owns the recovery code
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hash the recovery code before saving
     */
    public function setCodeAttribute($value): void
    {
        $this->attributes['code'] = Hash::make($value);
    }

    /**
     * Check if the provided code matches this recovery code
     */
    public function matches(string $code): bool
    {
        return Hash::check($code, $this->code);
    }

    /**
     * Mark this recovery code as used
     */
    public function markAsUsed(): void
    {
        $this->update([
            'used' => true,
            'used_at' => now(),
        ]);
    }

    /**
     * Scope for unused codes
     */
    public function scopeUnused($query)
    {
        return $query->where('used', false);
    }

    /**
     * Scope for used codes
     */
    public function scopeUsed($query)
    {
        return $query->where('used', true);
    }
}

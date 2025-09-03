<?php

namespace App\Domains\Announcement\Models;

use App\Domains\Announcement\Models\Traits\Scope\AnnouncementScope;
use Database\Factories\AnnouncementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class Announcement.
 */
class Announcement extends Model
{
    use AnnouncementScope,
        HasFactory,
        LogsActivity;

    public const TYPE_FRONTEND = 'frontend';
    public const TYPE_BACKEND = 'backend';

    /**
     * @var string[]
     */
    protected $fillable = [
        'area',
        'type',
        'message',
        'enabled',
        'starts_at',
        'ends_at',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * Required method for spatie/laravel-activitylog v4.x
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AnnouncementFactory::new();
    }
}

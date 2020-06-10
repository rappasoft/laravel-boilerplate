<?php

namespace App\Domains\Announcement\Models;

use App\Domains\Announcement\Models\Traits\Scope\AnnouncementScope;
use App\Models\RecordingModel;

/**
 * Class Announcement.
 */
class Announcement extends RecordingModel
{
    use AnnouncementScope;

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
}

<?php

namespace App\Models;

use App\Models\Traits\Scope\AnnouncementScope;

/**
 * Class Announcement.
 */
class Announcement extends RecordingModel
{
    use AnnouncementScope;

    /**
     * @var string[]
     */
    protected $fillable = [
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

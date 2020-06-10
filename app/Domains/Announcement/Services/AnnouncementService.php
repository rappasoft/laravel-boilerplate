<?php

namespace App\Domains\Announcement\Services;

use App\Domains\Announcement\Models\Announcement;
use App\Services\BaseService;

/**
 * Class AnnouncementService.
 */
class AnnouncementService extends BaseService
{
    /**
     * AnnouncementService constructor.
     *
     * @param  Announcement  $announcement
     */
    public function __construct(Announcement $announcement)
    {
        $this->model = $announcement;
    }

    /**
     * Get all the enabled announcements
     * For the frontend or globally
     * Where there's either no time frame or
     * if there is a start and end date, make sure the current time is in between that or
     * if there is only a start date, make sure the current time is past that or
     * if there is only an end date, make sure the current time is before that.
     *
     * @return mixed
     */
    public function getForFrontend()
    {
        return $this->model::enabled()
            ->forArea($this->model::TYPE_FRONTEND)
            ->inTimeFrame()
            ->get();
    }

    /**
     * Get all the enabled announcements
     * For the backend or globally
     * Where there's either no time frame or
     * if there is a start and end date, make sure the current time is in between that or
     * if there is only a start date, make sure the current time is past that or
     * if there is only an end date, make sure the current time is before that.
     *
     * @return mixed
     */
    public function getForBackend()
    {
        return $this->model::enabled()
            ->forArea($this->model::TYPE_BACKEND)
            ->inTimeFrame()
            ->get();
    }
}

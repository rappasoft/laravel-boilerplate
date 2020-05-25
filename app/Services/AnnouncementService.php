<?php

namespace App\Services;

use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

/**
 * Class AnnouncementService
 *
 * @package App\Services
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
     * Where there's either no time frame or
     * if there is a start and end date, make sure the current time is in between that or
     * if there is only a start date, make sure the current time is past that or
     * if there is only an end date, make sure the current time is before that.
     *
     * @return mixed
     */
    public function getForDisplay()
    {
        return $this->model::enabled()
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->whereNull('starts_at')
                        ->whereNull('ends_at');
                })->orWhere(function ($query) {
                    $query->whereNotNull('starts_at')
                        ->whereNotNull('ends_at')
                        ->where('starts_at', '<=', now())
                        ->where('ends_at', '>=', now());
                })->orWhere(function ($query) {
                    $query->whereNotNull('starts_at')
                        ->whereNull('ends_at')
                        ->where('starts_at', '<=', now());
                })->orWhere(function ($query) {
                    $query->whereNull('starts_at')
                        ->whereNotNull('ends_at')
                        ->where('ends_at', '>=', now());
                });
            })
            ->get();
    }
}

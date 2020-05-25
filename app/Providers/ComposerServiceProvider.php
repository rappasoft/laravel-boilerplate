<?php

namespace App\Providers;

use App\Services\AnnouncementService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('logged_in_user', auth()->user());
        });

        View::composer(['frontend.index', '*.layouts.app'], function ($view) {
            $view->with('announcements', resolve(AnnouncementService::class)->getForDisplay());
        });
    }
}

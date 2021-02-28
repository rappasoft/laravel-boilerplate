<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('logged_in_user', auth()->user());
        });
    }
}

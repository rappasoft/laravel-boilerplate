<?php

namespace App\Providers;

use App\Models\Access\User\User;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        /**
         * Register route model bindings
         */

        /**
         * Instead of throwing a generic 404 if the models are not found
         * Redirect back with error message
		 * TODO: currently this just redirects back but the session flash does not work.
		 * Keep commented to throw 404, uncomment to redirect back with no message.
         */
        /*$router->model('role', Role::class, function () {
            throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
        });

        $router->model('user', User::class, function () {
            throw new GeneralException(trans('exceptions.backend.access.users.not_found'));
        });*/

        /**
         * This allows us to use the Route Model Binding with SoftDeletes on
         * On a model by model basis
         */
        $router->bind('deletedUser', function($value) {
            $user = new User;
            return User::withTrashed()->where($user->getRouteKeyName(), $value)->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}

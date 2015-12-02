<?php namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package App\Providers
 */
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
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        View::addExtension('html', 'php'); // for to not need the .blade. in the filename

        /**
         * Useful Patterns
         **/
        Route::pattern('id', '\d+');
        Route::pattern('hash', '[a-z0-9]+');
        Route::pattern('hex', '[a-f0-9]+');
        Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
        Route::pattern('base', '[a-zA-Z0-9]+');
        Route::pattern('slug', '[a-z0-9-]+');
        Route::pattern('username', '[a-z0-9_-]{3,16}');
        Route::pattern('undefinedRoute', '.+');

        /**
         * Language Route
         **/
        $router->group(['namespace' => 'Language'], function () use ($router) {
            require_once app_path("Http/Routes/Language/Lang.php");
        });

        /**
         * Frontend Routes
         * Namespaces indicate folder structure
         */
        $router->group(['namespace' => 'Frontend'], function () use ($router) {
            require_once app_path("Http/Routes/Frontend/Frontend.php");
            require_once app_path("Http/Routes/Frontend/Access.php");
        });

        /**
         * Backend Routes
         * Namespaces indicate folder structure
         */
        $router->group(['namespace' => 'Backend'], function () use ($router) {
            $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
                /**
                 * These routes need view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
                 *
                 * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
                 */
                $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router) {
                    require_once app_path("Http/Routes/Backend/Dashboard.php");
                    require_once app_path("Http/Routes/Backend/Access.php");
                });
            });
        });

        /**
         * Catch all undefined routes. Stays at the bottom since order of routes matters.
         **/
		$router->group(['namespace' => $this->namespace], function($router)
		{
			// just in case you want to throw stuff in there
			require app_path('Http/routes.php');
		});
    }
}

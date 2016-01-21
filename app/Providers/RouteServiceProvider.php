<?php

namespace App\Providers;

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
    protected $namespace = 'App\API';

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
        $scan = scandir(app_path('API'));
        $directories = array_splice($scan, 0, 2);
        foreach ($directories as $directory) {
            if (is_dir(app_path('API/'.$directory)) && substr($directory, 0, 1) != '.') {
                $router->group(['namespace' => $this->namespace.'\\'.$directory.'\\Http', 'prefix' => $directory.'/api'], function ($router) use ($directory) {
                    require app_path('API/'.$directory.'/routes.php');
                });
            }
        }
    }
}

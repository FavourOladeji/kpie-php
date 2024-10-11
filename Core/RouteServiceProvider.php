<?php

namespace Core;

class RouteServiceProvider
{
    /**
     * Register all the routes in the application 
     * @return void
     */
    public static function register()
    {
        //Require_once all the files in the routes directory;
        $routes = base_path('routes');
        require base_path('routes/web.php');
    }

    /**
     * Handle and redirect all routes appropriately
     * @return void
     */
    public function handle()
    {

    }
}

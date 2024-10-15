<?php

namespace Core;

use Core\Exceptions\ValidationException;

class RouteServiceProvider
{
    /**
     * Register all the routes in the application 
     * @return void
     */
    public static function register()
    {
        //Require_once all the files in the routes directory;
        // $routes = base_path('routes');
        require base_path('routes/web.php');
    }

    /**
     * Handle and redirect all routes appropriately
     * @return void
     */
    public static function handle()
    {
        self::register();

        /**
         * @var Router
         */
        $router = app('router');
        $uri = parse_url($_SERVER["REQUEST_URI"])['path'];
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        // set_error_handler(function($errno, $errstr, $errfile, $errline) {
        //     // error was suppressed with the @-operator
        //     if (0 === error_reporting()) {
        //         return false;
        //     }
            
        //     throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        // });
        
        try {
            $router->route($uri, $method); 
        } catch (ValidationException $ex)
        {
            return redirect($router->previousUrl());
        } catch (\Throwable $th) {
            throw $th;
        }
         catch (\Exception $ex)
        {
            throw $ex;
        }
    }
}

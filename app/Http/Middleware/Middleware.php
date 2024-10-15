<?php

namespace App\Http\Middleware;

class Middleware{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class
    ];

    public static $web = [
        'csrf' => VerifyCsrfToken::class
    ];


    public static function resolve($key)
    {
        // handle all web middlewares
        self::handleWebMiddlewares();
        if (!$key)
        {
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        self::verifyMiddleware($middleware, $key);        

        (new $middleware)->handle();
    }

    public static function handleWebMiddlewares()
    {
        foreach (self::$web as $key => $middleware) {
            static::verifyMiddleware($middleware, $key);
            (new $middleware)->handle();
        }
    }

    public static function verifyMiddleware($middleware, $key)
    {
        if (!$middleware && !$middleware instanceof MiddlewareInterface)
        {
            throw new \Exception("No matching middleware found for key '{$key}'");
        }
    }
}

<?php

namespace App\Http\Middleware;

class Authenticated implements MiddlewareInterface
{
    public function handle()
    {
        if (isGuest())
        {
            return to_route('login');
        }
        return;
    }
}

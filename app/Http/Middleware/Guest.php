<?php

namespace App\Http\Middleware;

class Guest implements MiddlewareInterface
{
    public function handle()
    {
        if (!isGuest())
        {
            return to_route('home');
        }
        
        return true;
    }
}

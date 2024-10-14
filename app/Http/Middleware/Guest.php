<?php

namespace App\Http\Middleware;

class Guest implements MiddlewareInterface
{
    public function handle()
    {
       var_dump('here');
    }
}

<?php

namespace Core\Middleware;

class Guest implements MiddlewareInterface
{
    public function handle()
    {
       var_dump('here');
    }
}

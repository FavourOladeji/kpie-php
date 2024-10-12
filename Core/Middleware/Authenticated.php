<?php

namespace Core\Middleware;

class Authenticated implements MiddlewareInterface
{
    public function handle()
    {
       var_dump('authenticated');
    }
}

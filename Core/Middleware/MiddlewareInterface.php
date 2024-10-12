<?php

namespace Core\Middleware;

interface MiddlewareInterface
{
    /**
     * this function is run when the middleware is hit
     */
    public function handle();
}

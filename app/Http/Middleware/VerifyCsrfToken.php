<?php

namespace App\Http\Middleware;
use Core\Requests\Request;
use Core\Session;

class VerifyCsrfToken implements MiddlewareInterface
{
    public function handle()
    {
        $request = new Request();
        if ($request->method() != "POST")
        {
            return;
        }
        $requestCsrfToken = $request->post('csrf_token');
        if ($requestCsrfToken &&  $this->verifyCsrfToken($requestCsrfToken))
        {
            return;
        }
        
        throw new \Exception('Unable to verify CSRF token');
    }

    protected function verifyCsrfToken($requestCsrfToken)
    {
        return hash_equals(Session::get('csrf_token'), $requestCsrfToken);
    }

}

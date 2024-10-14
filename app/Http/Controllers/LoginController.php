<?php

namespace App\Http\Controllers;

use Core\Request;

class LoginController{
    public function index(Request $request)
    {
        view('login');
    }
    public function store()
    {
        dd('here');
    }
}

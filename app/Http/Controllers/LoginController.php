<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Core\Requests\Request;

class LoginController{
    public function index(Request $request)
    {
        view('login');
    }
    public function store(StoreLoginRequest $request)
    {
        // dd($request);
        // Validate the fields
        $request->validate('post');
        dd($request->errors);
        //Check the database and verify the record 

        //redirect appropriately 
    }
}

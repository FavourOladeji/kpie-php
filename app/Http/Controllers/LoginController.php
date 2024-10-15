<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Core\Requests\Request;

class LoginController{
    public function index(Request $request)
    {
        return view('login');
    }
    public function store(StoreLoginRequest $request)
    {
        // Validate the fields
        $request->validate();

        //Check the database and verify the record 

        //redirect appropriately 
    }
}

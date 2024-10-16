<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Core\Auth;
use Core\Exceptions\ValidationException;
use Core\Requests\Request;

class LoginController{
    public function index(Request $request)
    {
        return view('login');
    }
    public function store(StoreLoginRequest $request)
    {
        // Validate the fields
        $validated = $request->validated();

        //Check the database and verify the record 
        $user = auth()->login($validated['username'], $validated['password']);
        if (!$user)
        {
            ValidationException::throw(['username' => 'These details are not in our records']);
        }

        //redirect appropriately 
        return to_route('home');
    }
}

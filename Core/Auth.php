<?php

namespace Core;

class Auth
{
    public static function attempt( $email, $password)
    {
        $user =db()->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();
        if ($user || password_verify($password, $user['password']))
        {
            return $user;  
        }

        return false;
    }

    public static function login($email, $password)
    {
        $user = self::attempt($email, $password);
        if ($user == false)
        {
            return false;
        }
        
        session_regenerate_id(true);
        Session::put('user_id', $user['id']);
        return $user;

    }

    public static function id()
    {
        return Session::get('user_id');
    }
}

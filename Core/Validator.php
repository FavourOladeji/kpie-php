<?php

namespace Core;

class Validator
{
    public static function required($value)
    {
        $response = [
            'success' => true
        ];

        if (trim($value) == '')
        {
            $response['success']  = false;
            $response['message'] = "The {key} field is required";
        }
        return $response;
    }
    
}

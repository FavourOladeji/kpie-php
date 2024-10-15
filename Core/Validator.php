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

    public static function min($value, $mininum)
    {
        if (is_int($value))
        {
            $success =  $value >= $mininum;
        }

        if (is_string($value))
        {
            $is_string = true;
            $success = strlen($value) >= $mininum;
        }

        $response = [
            'success' => $success,
            'message' => !$success ? "The {key} field is has to be a minimum of {$mininum} " . ($is_string ? 'characters' : '' ): null
        ];
        return $response;
    }

    public static function email($value)
    {
    }
    
}

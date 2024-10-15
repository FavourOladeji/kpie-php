<?php

namespace Core\Exceptions;

use Core\Requests\Request;
use Core\Session;

class ValidationException extends \Exception{

    public readonly array $errors;

    public static function throw(?array $errors)
    {
        
        $instance =  new static('The form failed to validate');
        $instance->errors = static::transformErrors($errors);
        static::setOldValues();
        Session::flash('errors', $instance->errors);
        throw $instance;
    }

    protected static function setOldValues()
    {
        Session::flash('old', Request::attributes());
    }

    protected static function transformErrors($errors)
    {
        foreach ($errors as $key => $errorMessages)
        {
            if (!is_array($errorMessages))
            {
                $errors[$key] = [$errorMessages];
            }
        }
        
        return $errors;

    }

}

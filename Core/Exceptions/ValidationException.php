<?php

namespace Core\Exceptions;

use Core\Session;

class ValidationException extends \Exception{

    public readonly array $errors;
    public readonly array $old;
    public static function throw($errors, $old)
    {
        $instance =  new static('The form failed to validate');
        $instance->errors = $errors;
        $instance->old = $old;
        Session::flash('old', $old);
        Session::flash('errors', $errors);
        throw $instance;
    }
}

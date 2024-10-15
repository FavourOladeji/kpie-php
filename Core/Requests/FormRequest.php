<?php

namespace  Core\Requests;

use Core\Exceptions\ValidationException;
use Core\Validator;

class FormRequest extends Request implements FormRequestInterface
{
    public $errors;
    
    public function authorize()
    {
        return true;
    }

    protected function rules()
    {
        return [];
    }

    protected function attributes()
    {
        return [];
    }

    public function validate()
    {
        $requestRules = $this->rules();
        $requestMethod = strtolower($this->method);
        if (!method_exists(self::class, $requestMethod))
        {
            throw new \Exception("Unable to get request parameters");
        }
        $old = [];
        foreach ($requestRules as $key => $rules) {
            $value = call_user_func_array([self::class, $requestMethod], [$key]);
            // Store the value in a session in case you need to return it back to the user;
            $old[$key] = $value;
            foreach ($rules as $rule)
            {
                if (!method_exists(Validator::class, $rule))
                {
                    throw new \Exception("The validation rule '$rule' does not exist");
                }
                $validationResult = call_user_func_array([Validator::class, $rule], [$value]);
                if (!$validationResult['success'])
                {
                    $replace = $key;
                    if (array_key_exists($key, $this->attributes()))
                    {
                        $replace = $this->attributes()[$key];
                    }
                    $message = str_replace('{key}', $replace, $validationResult['message']);
                    $this->errors[$key][] = $message;
                }
                
            }
        }

        if (!empty($this->errors))
        {
            ValidationException::throw($this->errors, $old);
        }
    }

}

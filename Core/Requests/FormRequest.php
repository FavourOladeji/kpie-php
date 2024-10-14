<?php

namespace  Core\Requests;

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

    public function validate($method)
    {
        $requestRules = $this->rules();
        foreach ($requestRules as $key => $rules) {
            if (strtoupper($method) == 'POST')
            {
                $value = $this->post($key);
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
        }
    }

}

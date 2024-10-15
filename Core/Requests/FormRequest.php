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

    protected function attributeNames()
    {
        return [];
    }

    public function validate(array|string $fields = [])
    {
        $requestRules = $this->rules();
        if (is_string($fields))
        {
            $fields = [$fields];
        }
        if ($fields)
        {
            $requestRules = array_filter($requestRules, function ($rule, $field) use($fields) {
                return in_array($field, $fields);
            }, ARRAY_FILTER_USE_BOTH);
        } 
        $requestMethod = strtolower($this->method);
        if (!method_exists(self::class, $requestMethod))
        {
            throw new \Exception("Unable to get request parameters");
        }
        $validated = [];
        foreach ($requestRules as $key => $rules) {
            $value = call_user_func_array([self::class, $requestMethod], [$key]);
            // Store the value in a session in case you need to return it back to the user;
            $validated[$key] = $value;
            foreach ($rules as $rule)
            {
                $rule = explode(':', $rule);
                $method = $rule[0];
                $arguments = $rule[1] ?? null;
                if (!method_exists(Validator::class, $method))
                {
                    throw new \Exception("The validation rule '$method' does not exist");
                }
                $validationResult = call_user_func_array([Validator::class, $method], [$value, $arguments]);
                if (!$validationResult['success'])
                {
                    $replace = $key;
                    if (array_key_exists($key, $this->attributeNames()))
                    {
                        $replace = $this->attributeNames()[$key];
                    }
                    $message = str_replace('{key}', $replace, $validationResult['message']);
                    $this->errors[$key][] = $message;
                }
                
            }
        }

        if (!empty($this->errors))
        {
            ValidationException::throw($this->errors);
        }
        return $validated;
    }

    public function validated(string|array $fields = [])
    {

        $validated = $fields ? self::validate($fields): self::validate();
        return $validated;
    }

}

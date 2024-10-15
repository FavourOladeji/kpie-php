<?php

namespace   App\Http\Requests;

use Core\Requests\FormRequest;
use Core\Validator;

class StoreLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required'],
            'password' => ['required', 'min:7']
        ];
    }
   

    public function attributeNames()
    {
        return [
            'username' => 'Username',
            'password' => 'Password'
        ];
    }
}

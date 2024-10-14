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
            'password' => ['required']
        ];
    }
   

    public function attributes()
    {
        return [
            'username' => 'Username',
            'password' => 'Password'
        ];
    }
}

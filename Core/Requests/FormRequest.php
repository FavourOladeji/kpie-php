<?php

namespace  Core\Requests;

class FormRequest extends Request implements FormRequestInterface
{
    public $errors;
    
    public function authorize()
    {
        return true;
    }

}

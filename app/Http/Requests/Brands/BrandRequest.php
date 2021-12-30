<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function rules()
    {
        return  [
            'name' =>['required', 'string']
        ];
    }
}
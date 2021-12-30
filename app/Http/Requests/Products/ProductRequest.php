<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'string'],
            'category_id' => ['required', 'integer']
        ];
    }
}

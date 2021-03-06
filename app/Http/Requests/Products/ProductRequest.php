<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
            'brand_id' => ['nullable', 'integer'],
        ];
    }
}

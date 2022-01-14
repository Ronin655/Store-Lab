<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'price' => ['integer'],
            'image' => ['string'],
            'category_id' => ["integer"],
        ];
    }
}

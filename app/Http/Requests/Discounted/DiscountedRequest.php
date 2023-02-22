<?php

namespace App\Http\Requests\Discounted;

use Illuminate\Foundation\Http\FormRequest;

class DiscountedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'string'],
            'product_id' => ['required', 'integer'],
            'brand_id' => ['required', 'integer']

        ];
    }
}

<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'quantity' => ['required', 'integer', 'min:1'],
            'product_id' => ['required', 'integer', 'min:1', 'exists:products,id'],
        ];
    }
}

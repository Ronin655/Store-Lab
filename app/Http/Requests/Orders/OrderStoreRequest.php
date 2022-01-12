<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_items' => ['required', 'array'],
            'order_items.*.product_id' => ['required', 'numeric', 'exists:products,id'],
            'order_items.*.quantity' => ['sometimes', 'required', 'numeric'],
        ];
    }
}

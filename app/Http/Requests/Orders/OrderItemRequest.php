<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemRequest extends FormRequest
{
    public function rules():array
    {
        return
        [
            'order-items' => ['quantity']
        ];
    }
}

<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'quantity' => ['integer', 'min:1'],
        ];
    }
}

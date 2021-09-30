<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():String
    {
        return [
            'type' => ['required', 'string'],
            'name' => ['required', 'string'],
            'completed' => ['required', 'boolean'],
        ];
    }

}

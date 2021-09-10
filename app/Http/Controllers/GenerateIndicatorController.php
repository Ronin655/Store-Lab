<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenerateIndicatorController
{
    public function generate(Request $request)
    {
        $type = $request->get('type');
        $length = $request->get('length', 6);

        $indicator = new Indicator();
        $indicator->value = $this->getValue($length, $type);
        $indicator->save();

        return response()->json([
            'id' => $indicator->id,
        ]);
    }

    /**
     * @param $length
     * @param $type
     * @return int|string
     */
    public function getValue($length, $type)
    {
        if ($type == 'string') {
            return  Str::random($length);
        }

        if ($type == 'uuid') {
            return Str::limit(Str::uuid(), $length, '');
        }
        return rand(
            pow(10, $length - 1),
            pow(10, $length) - 1
        );
    }

}

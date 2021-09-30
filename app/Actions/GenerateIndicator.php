<?php

namespace App\Actions;

use App\Http\Requests\StoreIndicatorRequest;
use App\Models\Indicator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenerateIndicator
{
    public function generate(Request $request): JsonResponse
    {
        $request->validate([
            'length' => ['numeric'],
            'type' => ['string'],
        ]);

        $type = $request->get('type');
        $length = $request->get('length', 6);

        $indicator = new Indicator();
        $indicator->value = $this->getValue($length, $type);
        $indicator->save();

        return $indicator;
    }
}

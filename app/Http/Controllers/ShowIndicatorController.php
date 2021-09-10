<?php

namespace App\Http\Controllers;

use App\Models\Indicator;

class ShowIndicatorController
{
    public function show(int $id)
    {
        $indicator = Indicator::query()->where('id', $id)->firstOrFail();

        return response()->json([
            'value' => $indicator->value
        ]);
    }
}

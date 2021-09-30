<?php

namespace App\Http\Controllers;

use App\Models\Indicator;

class ShowIndicatorController
{
    public function __invoke(Indicator $indicator)
    {
        return response()->json([
            'value' => $indicator
        ]);
    }
}

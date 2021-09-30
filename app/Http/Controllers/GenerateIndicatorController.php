<?php

namespace App\Http\Controllers;

use App\Actions\ValueIndicator;
use App\Http\Actions\GenerateIndicator;
use App\Models\Indicator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class GenerateIndicatorController
{
    /** @var GenerateIndicator */
    private $generateIndicator;
    /** @var ValueIndicator */
    private $valueIndicator;

    public function generate(Request $request): JsonResponse
    {
        return $this->generateIndicator->generate($request);
    }

    public function getValue(int $length, ?string $type): string
    {
        return $this->getValue($length, $type);
    }
}

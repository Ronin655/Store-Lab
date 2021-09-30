<?php

namespace App\Http\Controllers;

use App\Actions\ValueIndicator;
use App\Http\Requests\StoreIndicatorRequest;
use App\Http\Resources\IndicatorCollectionResource;
use App\Http\Resources\IndicatorResource;
use App\Models\Indicator;
use GuzzleHttp\Psr7\Request;

class IndicatorController
{
    public function index(): IndicatorCollectionResource
    {
        $indicators = Indicator::query()->get();

        return new IndicatorCollectionResource($indicators);
    }
    public function show(Indicator $indicator):IndicatorResource
    {
        return new IndicatorResource($indicator);
    }

    public function store():StoreIndicatorRequest
    {
        $indicator = Indicator::query()->get();

        return new StoreIndicatorRequest($indicator);
    }

    public function getValue(Request $request, Indicator $indicator):IndicatorResource
    {
        $indicator = (new ValueIndicator())->getValue($request, $indicator);

        return new IndicatorResource($indicator);
    }

}

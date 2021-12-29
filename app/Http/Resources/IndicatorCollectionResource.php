<?php

namespace App\Http\Resources;

use App\Http\Controllers\IndicatorController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndicatorCollectionResource extends ResourceCollection
{
    public $collects = IndicatorResource::class;
}


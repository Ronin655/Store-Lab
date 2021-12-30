<?php

namespace App\Http\Resources\Brands;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandCollectionResource extends ResourceCollection
{
    public $collects = BrandResource::class;
}
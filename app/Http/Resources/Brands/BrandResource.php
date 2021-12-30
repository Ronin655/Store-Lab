<?php

namespace App\Http\Resources\Brands;

use App\Http\Resources\Products\ProductCollectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products' => new ProductCollectionResource($this->whenLoaded('products'))
        ];
    }
}
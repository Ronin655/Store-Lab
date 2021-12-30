<?php

namespace App\Http\Resources\Categories;

use App\Http\Resources\Products\ProductCollectionResource;
use App\Models\Categories\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products' => new ProductCollectionResource($this->whenLoaded('products')),
        ];
    }
}

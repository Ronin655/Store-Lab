<?php

namespace App\Http\Resources\Orders;

use App\Http\Resources\Products\ProductResource;
use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin OrderItem
 */
class OrderItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}

<?php

namespace App\Http\Resources\Orders;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @mixin Order
 */
class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'price' => $this->price,
            'status' => $this->status,
        ];
    }
}

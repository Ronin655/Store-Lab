<?php

namespace App\Services;

use App\DTO\OrderItemData;
use App\Http\Requests\Orders\OrderItemRequest;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Products\Product;

class OrderItemService
{
    public function store(OrderItemData $data, Order $order): OrderItem
    {
        $product = Product::find($data->productId);

        $orderItem = new OrderItem();
        $orderItem->order()->associate($order);
        $orderItem->product()->associate($product);
        $orderItem->quantity = $data->quantity;
        $orderItem->price = $product->price * $data->quantity;
        $orderItem->save();

        return $orderItem;
    }

    public function update(OrderItemRequest $request): Order
    {

    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->noContent();
    }
}

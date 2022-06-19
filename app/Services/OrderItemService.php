<?php

namespace App\Services;

use App\DTO\OrderItemData;
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

    public function customStore(int $quantity, int $productId, Order $order)
    {
        $orderItem = new OrderItem();
        $orderItem->order()->associate($order);
        $orderItem->product()->associate($productId);
        $orderItem->quantity = $quantity;
        $orderItem->price = Product::find($productId)->price * $quantity;
        $orderItem->save();

        return $orderItem;
    }

    public function update(int $quantity, OrderItem $orderItem)
    {
        $orderItem->update([
            'quantity' => $quantity,
            'price' => $orderItem->product->price * $quantity,
        ]);

        return $orderItem->fresh();
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
    }


}

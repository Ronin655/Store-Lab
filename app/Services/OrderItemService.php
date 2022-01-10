<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products\Product;

class OrderItemService
{
    public function store(array $data, Order $order): OrderItem
    {
        $product = Product::find($data['product_id']);
        $quantity = $data['quantity'] ?? 1;

        $orderItem = new OrderItem();
        $orderItem->order()->associate($order);
        $orderItem->product()->associate($product);
        $orderItem->quantity = $quantity;
        $orderItem->price = $product->price * $quantity;
        $orderItem->save();

        return $orderItem;
    }

}

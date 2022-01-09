<?php

namespace App\Services;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Models\Products\Product;
use Illuminate\Support\Arr;

class OrderService
{
    public function store(OrderStoreRequest $request, Order $order)
    {
        $user = auth()->user();
        $order = new Order();
        $order->user()->associate($user);
        $order->fill(Arr::except($request->validated(), ['product_id', 'order_id']));
        $order->orderItems()->associate($request->get('product_id'));
        $order->price = 0;
        $order->status = 0;
        $order->save();

        $totalPrice = 0;
        foreach ($request->order_items as $order_item) {
            $product = Product::find($order_item['product_id']);
            $totalPrice = $totalPrice + $product->price * ($order_item['quantity'] ?? 1);

            $orderitem = new OrderItem();
            $orderitem->order()->associate($order);
            $orderitem->product()->associate($product);
            $orderitem->quantity = $order_item['quantity'] ?? 1;
            $orderitem->save();
        }
            $order->price = $totalPrice;
            $order->save();

        return $order;
    }
}


<?php

namespace App\Services;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use Illuminate\Support\Arr;

class OrderService
{
    public function store(OrderStoreRequest $request, Order $order): Order
    {
        $order = new Order();

        $order->fill(Arr::except($request->validated(),['product_id', 'order_id'], ));

        $order->orderItems()->associate($request->get('product_id'));
        $order->user()->associate($user);
        $order->price = 0;
        $order->status = 0;
        $order->save();


        return new OrderResource($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
    }
}
<?php

namespace App\Services;

use App\Http\Requests\Orders\OrderStoreRequest;
use App\Models\Orders\Order;
use App\Models\User;

class OrderService
{
    private OrderItemService $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function store(OrderStoreRequest $request, User $user): Order
    {
        $order = new Order();
        $order->user()->associate($user);
        $order->fill([
            'price' => 0,
            'status' => 0,
        ]);
        $order->save();

        foreach ($request->order_items as $orderItem) {
            $this->orderItemService->store($orderItem, $order);
        }

        $order->price = $order->orderItems->sum('price');
        $order->save();

        return $order;
    }
}


<?php

namespace App\Services;

use App\DTO\OrderData;
use App\Models\Orders\Order;
use App\Models\User;

class OrderService
{
    private OrderItemService $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function store(OrderData $data, User $user): Order
    {
        $order = new Order();
        $order->user()->associate($user);
        $order->fill([
            'price' => 0,
            'status' => 0,
        ]);
        $order->save();

        return $this->addOrderItems($data, $order);
    }

    public function addOrderItems(OrderData $data, Order $order): Order
    {
        foreach ($data->orderItems as $orderItem) {
            $this->orderItemService->store($orderItem, $order);
        }

        $order->price = $order->orderItems->sum('price');
        $order->save();

        return $order;
    }
}


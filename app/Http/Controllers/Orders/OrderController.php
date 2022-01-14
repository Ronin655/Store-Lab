<?php

namespace App\Http\Controllers\Orders;

use App\DTO\OrderData;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\User;
use App\Services\OrderService;
use function auth;

class OrderController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderStoreRequest $request): OrderResource
    {
        /** @var User $user */
        $user = auth()->user();
        $order = $this->orderService->store(new OrderData($request->order_items), $user);

        return new OrderResource($order->load('orderItems.product'));
    }
}

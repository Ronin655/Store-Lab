<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

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
        $order = $this->orderService->store($request, $user);

        return new OrderResource($order->load('orderItems.product'));
    }
}

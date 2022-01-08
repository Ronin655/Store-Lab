<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Services\OrderService;

class OrderController
{
    public OrderService $orderService;

    public function store(OrderStoreRequest $request): OrderStoreRequest
    {
        $order = $this->orderService->store($request);

        return new OrderResource($order);
    }
}
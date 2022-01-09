<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Services\OrderService;

class OrderController
{
    public function store(OrderStoreRequest $request, Order $order): OrderResource
    {
        $order = $this->orderService->store($request);

        return $order;
    }
}

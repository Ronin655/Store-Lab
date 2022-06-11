<?php

namespace App\Http\Controllers\Orders;

use App\DTO\OrderData;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Services\OrderItemService;
use App\Services\OrderService;

class OrderItemController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderStoreRequest $request, Order $order): OrderResource
    {
        $order = $this->orderService->addOrderItems(new OrderData($request->order_items), $order);

        return new OrderResource($order);
    }

    public function update(OrderStoreRequest $request, OrderItemService $orderItemService)
    {
        $orderItemService->update($request, $orderItemService);

        return $orderItemService;
    }

    public function destroy(OrderItem $orderItem)
    {
        $this->orderService->delete($orderItem);

        return response()->noContent();
    }
}

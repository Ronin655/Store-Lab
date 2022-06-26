<?php

namespace App\Http\Controllers\Orders;

use App\DTO\OrderItemData;
use App\Http\Requests\Orders\OrderItemStoreRequest;
use App\Http\Requests\Orders\OrderItemUpdateRequest;
use App\Http\Resources\Orders\OrderItemResource;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Services\OrderItemService;

class OrderItemController
{
    public function store(OrderItemStoreRequest $request, Order $order, OrderItemService $orderItemService)
    {
        $orderItem = $orderItemService
            ->store(
                new OrderItemData(
                    $request->get('product_id'),
                    $request->get('quantity'),
                ),
                $order,
            );

        return new OrderItemResource($orderItem);
    }

    public function update(OrderItemUpdateRequest $request, OrderItem $orderItem, OrderItemService $orderItemService)
    {
        $orderItem = $orderItemService->update(
            $request->get('quantity', 1),
            $orderItem
        );

        return new OrderItemResource($orderItem);
    }
}

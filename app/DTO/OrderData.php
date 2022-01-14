<?php

namespace App\DTO;

class OrderData
{
    /** @var OrderItemData[] $orderItems */
    public array $orderItems;

    public function __construct(array $orderItems)
    {
        $mappedOrderItems = [];
        foreach ($orderItems as $orderItem) {
            $mappedOrderItems[] = new OrderItemData($orderItem['product_id'], $orderItem['quantity'] ?? 1);
        }

        $this->orderItems = $mappedOrderItems;
    }
}

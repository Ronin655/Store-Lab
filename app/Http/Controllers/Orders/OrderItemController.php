<?php

namespace App\Http\Controllers\Orders;

use App\Http\Requests\Orders\OrderStoreRequest;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use Illuminate\Http\Request;

class OrderItemController
{
    public function store(OrderStoreRequest $request, Order $order)
    {
        $order = $this
    }

    public function destroy(Request $request, OrderItem $orderItem)
    {

    }
}

<?php

namespace App\Models\Presenter;

use App\Models\Order;

class OrderPresenter
{
    public function __construct(protected Order $order) {}

    public function status()
    {
        return match($this->order->status()) {
            'placed_at' => 'Order Placed',
            'packaged_at' => 'Order Packed',
            'shipped_at' => 'Order shipped',
            default => ''

        };
    }
}

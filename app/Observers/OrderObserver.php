<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function updated(Order $order)
    {
        // dd($order);
        $originalOrder = new Order(
            collect($order->getOriginal())
            ->only($order->statuses)
            ->toArray()
        );


        $filledStatuses = collect($order->getDirty())
        ->only($order->statuses)
        ->filter(fn($status) => filled($status));

        if ($originalOrder->status() !== $order->status() && $filledStatuses->count()) {
            dd('send email');
        }
    }
}

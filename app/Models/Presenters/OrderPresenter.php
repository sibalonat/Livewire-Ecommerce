<?php

namespace App\Models\Presenter;

use App\Models\Order;

class OrderPresenter
{
    public function __construct(protected Order $order) {}

    public function status()
    {
        return 'presenter';
    }
}

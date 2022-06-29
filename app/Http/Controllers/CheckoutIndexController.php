<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart\Contracts\CartInterface;
use App\Http\Middleware\RedirectIfCartEmpty;
use App\Cart\Exceptions\QuantityNoLongerAvailable;

class CheckoutIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(RedirectIfCartEmpty::class);
    }

    public function __invoke(CartInterface $card)
    {
        try {
            $card->verifyAvailableQuantities();
        } catch (QuantityNoLongerAvailable $e) {
            //throw $th;
            $card->syncAvailableQuantities();
        }

        return view('checkout');
    }
}

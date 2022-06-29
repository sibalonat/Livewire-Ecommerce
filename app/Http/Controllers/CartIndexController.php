<?php

namespace App\Http\Controllers;

use App\Cart\Contracts\CartInterface;
use App\Cart\Exceptions\QuantityNoLongerAvailable;
use Illuminate\Http\Request;

class CartIndexController extends Controller
{
    public function __invoke(CartInterface $card)
    {

        try {
            $card->verifyAvailableQuantities();
        } catch (QuantityNoLongerAvailable $e) {
            //throw $th;
            $card->syncAvailableQuantities();
        }

        return view('cart.index');
    }
}

<?php

namespace App\Http\Livewire;

use App\Cart\Contracts\CartInterface;
use App\Models\ShippingType;
use Livewire\Component;

class Checkout extends Component
{
    public $shippingId;

    public $shippingTypes;

    public function mount()
    {
        $this->shippingTypes = ShippingType::orderBy('price', 'asc')->get();

        $this->shippingId = $this->shippingTypes->first()->id;
    }

    public function getShippingTypeProperty()
    {
        return $this->shippingTypes->find($this->shippingId);
    }

    public function render(CartInterface $cart)
    {
        return view('livewire.checkout', [
            'cart' => $cart,
            // 'shippingTypes' => ShippingType::orderBy('price', 'asc')->get(),
        ]);
    }
}

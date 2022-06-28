<?php

namespace App\Http\Livewire;

// use money;
use Livewire\Component;
use App\Models\ShippingType;
use App\Cart\Contracts\CartInterface;
use App\Models\ShippingAddress;

class Checkout extends Component
{
    public $shippingId;

    public $shippingAddress;

    public $shippingTypes;

    public $accountForm = [
        'email' => ''
    ];

    public $shippingForm = [
        'address' => '',
        'city' => '',
        'postcode' => ''
    ];

    protected $validationAttributes = [
        'accountForm.email' => 'email address',
        'accountForm.address' => 'address',
        'accountForm.city' => 'city',
    ];

    protected $messages = [
        'accountForm.email.unique' => ' Duket se regjistruar nje here. Me mire logohu '
    ];

    public function rules()
    {
        return [
            'accountForm.email' => 'required|email|max:255|unique:users,email' . (auth()->user() ? ',' . auth()->user()->id : '' ),
            'accountForm.address' => 'required | max:255',
            'accountForm.city' => 'required | max:255',
            'accountForm.postcode' => 'required | max:255',
            'shippingId' => 'required |exists:shipping_types,id',
        ];
    }

    public function checkout()
    {
        $this->validate();

        $this->shippingAddress = ShippingAddress::firstOrCreate($this->shippingForm);

        // dd('created');

    }

    public function mount()
    {
        $this->shippingTypes = ShippingType::orderBy('price', 'asc')->get();

        $this->shippingId = $this->shippingTypes->first()->id;

        if ($user = auth()->user()) {
            // dd($user);
            $this->accountForm['email'] = $user->email;
        }
    }

    public function getShippingTypeProperty()
    {
        return $this->shippingTypes->find($this->shippingId);
    }

    public function getTotalProperty(CartInterface $cart)
    {
        return $cart->subtotal() + $this->shippingType->price;
    }

    public function render(CartInterface $cart)
    {
        return view('livewire.checkout', [
            'cart' => $cart,
            // 'shippingTypes' => ShippingType::orderBy('price', 'asc')->get(),
        ]);
    }
}

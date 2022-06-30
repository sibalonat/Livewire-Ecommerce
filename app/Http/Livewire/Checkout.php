<?php

namespace App\Http\Livewire;

// use money;
use Livewire\Component;
use App\Models\ShippingType;
use App\Cart\Contracts\CartInterface;
use App\Models\Order;
use App\Models\ShippingAddress;

class Checkout extends Component
{
    public $shippingId;

    protected $shippingAddress;

    public $shippingTypes;

    public $userShippingAddressId;

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
        'shippingForm.address' => 'address',
        'shippingForm.city' => 'city',
    ];

    protected $messages = [
        'accountForm.email.unique' => ' Duket se regjistruar nje here. Me mire logohu '
    ];

    public function rules()
    {
        return [
            'accountForm.email' => 'required|email|max:255|unique:users,email' . (auth()->user() ? ',' . auth()->user()->id : '' ),
            'shippingForm.address' => 'required | max:255',
            'shippingForm.city' => 'required | max:255',
            'shippingForm.postcode' => 'required | max:255',
            'shippingId' => 'required |exists:shipping_types,id',
        ];
    }

    public function checkout(CartInterface $cart)
    {
        $this->validate();

        $this->shippingAddress = ShippingAddress::query();

        if (auth()->user()) {
            $this->shippingAddress = $this->shippingAddress->whereBelongsTo(auth()->user());
        }

        ($this->shippingAddress = $this->shippingAddress->firstOrCreate($this->shippingForm))
            ?->user()
            ->associate(auth()->user())
            ->save();

        $order = Order::make(array_merge($this->accountForm, [
            'subtotal' => $cart->subtotal()
        ]));

        $order->user()->associate(auth()->user());
        $order->shippingType()->associate($this->shippingType);
        $order->shippingAddress()->associate($this->shippingAddress);

        // dd($order);

        $order->save();

        $order->variations()->attach(
            $cart->contents()->mapWithKeys(function($variation) {
                return [
                    $variation->id => [
                        'quantity' => $variation->pivot->quantity
                    ]
                ];
            })
            ->toArray()
        );

        $cart->contents()->each(function($variation) {
            $variation->stocks()->create([
                'amount' => 0 - $variation->pivot->quantity
            ]);
        });

        $cart->removeAll();

        if (!auth()->user()) {
            return redirect()->route('orders.confirmation', $order);
        }

        return redirect()->route('orders');

        // dd($order);
        // dd('created');
    }

    public function updatedUserShippingAddressId($id)
    {
        if (!$id) {
            return;
        }

        $this->shippingForm = $this->userShippingAddresses->find($id)
        ->only('address', 'city', 'postcode');

    }

    public function getUserShippingAddressesProperty()
    {
        return auth()->user()?->shippingAddresses;
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

@if (!$cart->isEmpty())


<div class="grid grid-flow-col grid-cols-6 gap-4 overflow-hidden sm:rounded-lg">
    <div class="self-start col-span-4 p-6 -mt-3 bg-white border-b border-gray-200">
        {{-- {{ $cart->contents() }} --}}
        @foreach ($cart->contents() as $variation)

        <livewire:cart-item :variation="$variation" :key="$variation->id" />

        @endforeach
    </div>

    <div class="self-start col-span-2 p-6 bg-white border-b border-gray-200">
        <div class="space-y-4">
            <div class="space-y-1">
                <div class="flex items-center justify-between space-y-1">
                    <div class="font-semibold">Subtotal</div>
                    <h1 class="text-xl font-semibold">
                        {{ $cart->formattedSubtotal() }}
                    </h1>
                </div>
            </div>
            {{-- <a href="/checkout">Checkout</a> --}}
           <x-button-anchor>Checkout</x-button-anchor>

        </div>
    </div>
</div>

@else

<div class="p-6 bg-white border-b border-gray-200">
    Your cart is empty
</div>

@endif

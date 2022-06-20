<div class="overflow-hidden sm:rounded-lg grid grid-cols-6 grid-flow-col gap-4">
    <div class="p-6 bg-white border-b border-gray-200 col-span-4 -mt-3 self-start">
        {{-- {{ $cart->contents() }} --}}
        @foreach ($cart->contents() as $variation)

        <livewire:cart-item :variation="$variation" />

        @endforeach
    </div>

    <div class="p-6 bg-white border-b border-gray-200 col-span-2 self-start">
        cart summary
    </div>
</div>

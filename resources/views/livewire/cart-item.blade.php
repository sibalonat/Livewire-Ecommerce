<div class="flex items-center py-3 border-b last:border-0 last:pb-0">
    <div class="w-20 mr-4">
        <img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}" class="w-20" alt="">
    </div>
    <div class="space-y-2">
        <div>
            <div class="text-lg font-semibold">
                {{ $variation->formattedPrice() }}
            </div>
            <div class="space-y-1">
                <div>{{ $variation->product->title }}</div>
                <div class="flex items-center text-sm">
                    @foreach ($variation->ancestorsAndSelf->reverse() as $ancestor )

                    {{ $ancestor->title }}
                    @if (!$loop->last) <span class="mx-1 text-gray-400"> / </span> @endif

                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2 text-sm">
                <div class="font-semibold">Quantity</div>
                <select class="text-sm border-none" wire:model='quantity'>
                    @for ($quantity = 1; $quantity <= $variation->stockCount(); $quantity++)
                    <option value="{{ $quantity }}">{{ $quantity }}</option>
                    @endfor
                </select>
            </div>
            <button class="text-sm" wire:click='remove'>
                remove
            </button>
        </div>
    </div>
    {{-- {{ $variation->title }} --}}
</div>

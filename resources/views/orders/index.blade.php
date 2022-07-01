<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{-- {{ __('Order') }} --}}
            Thank you for your order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                {{-- each --}}
                @forelse ($orders as $order)
                    <div class="col-span-4 p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between pb-3 border-b">
                            <div>#{{ $order->id }}</div>
                            <div>{{ $order->formattedSubtotal() }}</div>
                            <div>{{ $order->shippingType->title }}</div>
                            <div>{{ $order->created_at->toDateTimeString() }}</div>
                            <div>order status</div>
                        </div>
                        @foreach ($order->variations as $variation)
                            <div class="flex items-center py-3 space-y-2 border-b last:border-0 last:pb-0">
                                <div class="w-16 mr-4">
                                    <img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}"
                                        class="w-16" alt="">
                                </div>
                                <div class="space-y-1">
                                    <div>
                                        <div class="font-semibold">{{ $variation->formattedPrice() }}</div>
                                        <div>{{ $variation->product->title }}</div>
                                    </div>
                                    <div class="flex items-center text-sm">
                                        <div class="mr-1 font-semibold">
                                            Quantity: {{ $variation->pivot->quantity }} <span
                                                class="mx-1 text-gray-400">/</span>
                                        </div>
                                        @foreach ($variation->ancestorsAndSelf as $ancestor)
                                            {{ $ancestor->title }} @if (!$loop->last)
                                            <span class="mx-1 text-gray-400">/</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

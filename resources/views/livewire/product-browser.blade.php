<div class="grid grid-cols-6 gap-4 py-12 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="col-span-1">
        <div class="space-y-6">
            <div class="space-y-1">
                <ul>
                    @foreach ($category->children as $child)
                        <li>
                            <a href="/categories/{{ $child->slug }}" class="text-indigo-500">
                                {{ $child->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-6">
                @if ($category->products->count())
                <div class="space-y-1">
                    <div class="font-semibold">max price ({{ money($priceRange['max']) }})</div>
                    <div class="flex items-center space-x-2">
                        <input type="range" min="0" max="{{ $maxPrice }}" wire:model='priceRange.max'>
                    </div>
                </div>
                @endif

                @if ($products->count())

                    @foreach ($filters as $title => $filter)
                        <div class="space-y-1">
                            <div class="font-semibold">{{ Str::title($title) }}</div>
                            @foreach ($filter as $option => $count)
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="{{ $title }}_{{ strtolower($option) }}"
                                        wire:model='queryFilters.{{ $title }}' value="{{ $option }}">
                                    <label for="{{ $title }}_{{ strtolower($option) }}">
                                        {{ $option }}({{ $count }})
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
    <div class="col-span-5 sm:px-6 lg:px-8">
        <div class="mb-6">
            found {{ $products->count() }} {{ Str::plural('product', $products->count()) }} matching your filters
        </div>
        <div class="grid gap-4 overflow-hidden sm:rounded-lg lg:grid-cols-3 md:grid-cols-2">
            @foreach ($products as $product)
                <a href="/products/{{ $product->slug }}" class="p-6 space-y-4 bg-white border-b border-gray-200">
                    <img src="{{ $product->getFirstMediaUrl() }}" alt="" class="w-full">
                    <div class="space-y-1">

                        <div>{{ $product->title }}</div>
                        <div class="text-lg font-semibold">
                            {{ $product->formattedPrice() }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<x-app-layout>
    <x-slot name="header">
        <div class="space-x-1">
            @foreach ($category->ancestors->reverse() as $ancestor)
            <a href="/categories/{{ $ancestor->slug }}" class="text-indigo-500">
                {{ $ancestor->title }}
            </a>
            <span class="font-bold text-gray-300 last:hidden">/</span>
            @endforeach
        </div>
        <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-800">
            {{ $category->title }}
        </h2>
    </x-slot>
    <livewire:product-browser :category="$category" />

</x-app-layout>

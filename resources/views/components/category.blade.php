<div class="ml-4">
    {{ $category->title }}
    <a href="/categories/{{ $category->slug }}" class="{{ $category->depth === 0 ? 'font-bold' : '' }}"></a>
    @foreach ($category->children as $child)
    <div class="ml-4">
        <x-category :category="$child" />
    </div>
    @endforeach
</div>

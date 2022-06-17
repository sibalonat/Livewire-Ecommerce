<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <div>
                        <x-category :category="$category" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

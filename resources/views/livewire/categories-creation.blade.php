<div>
    <x-button class="bg-gray-400 px-6 h-12 rounded-lg mr-2" wire:click="$set('createNewCategory', true)">New category</x-button>
    @if ($createNewCategory)
    <div class="mt-4">
        <form class="flex items-center" wire:submit.prevent='createCategory'>
            {{ json_encode($newCategoryState) }}
            <input type="text" wire:model='newCategoryState.title' class="px-3 h-10 border-2 border-gray-200 rounded-lg mr-2">
            <x-button type="submit" class="bg-yellow-300 h-10 inline-flex rounded-md font-semibold text-gray-800 mr-3">Create</x-button>
            <button wire:click="$set('createNewCategory', false)" type="button" class="bg-green-100 h-10 inline-flex items-center rounded-md font-semibold text-gray-800 px-6 ml-4">Cancel</button>
        </form>
    </div>
    @endif
</div>

<div class="space-y-6">
    @if ($initialVariation)
        <livewire:product-dropdown :variations=$initialVariation />
    @endif

    @if ($skuVariant)
    <div class="space-y-6">
        <div class="text-lg font-semibold">
            {{ $skuVariant->formattedPrice() }}
        </div>
        <x-button wire:click.prevent="addToCard">Add to Card</x-button>
    </div>
    @endif

</div>

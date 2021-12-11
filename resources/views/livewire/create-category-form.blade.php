<td colspan="5" class="w-full text-center py-3 {{ $background }}">
    <x-label for="group_name">{{ __('Nueva categoría') }}</x-label>
    <x-input type="text" id="group_name" wire:model="category_name"/>
    <x-button class="ml-8" wire:click="create_category()">{{ __('Crear') }}</x-button>
</td>

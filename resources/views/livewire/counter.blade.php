<div>
    @error('quantity')
    <x-alerts.error :message="$message"/> @enderror
    @if($message)
        <x-alerts.success :message="$message"/> @endif
    @if($is_in_stock)
    <div class=" flex imput-group text-center mb-3 ml-24">
        <div class="custom-number-input h-10 w-32">
            <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Cantidad</label>
            <div class="flex flex-row h-10 w-32 rounded-lg relative bg-transparent mt-1 text-center">
                <button type="button" wire:click="decrement"
                        class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                </button>
                <input type="number" value="{{$count}}" id="custom-input-number"
                       class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none justify-center">
                <button type="button" wire:click="increment"
                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
            </div>
        </div>
        @if(!$is_in_cart)
            <label for="agregar"></label>
            <div class="ml-8">
                <button type="button" id="agregar" wire:click="add_to_cart()"
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-6 text-sm mr-2">
                    {{ __('Agregar al carro') }}
                </button>
            </div>
        @elseif($is_in_stock)
            <div class="ml-8">
                <label for="actualizar"></label>
                <button type="button" id="actualizar" wire:click="update_cart()"
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-6 text-sm mr-2">
                    {{ __('Actualizar carro') }}
                </button>
                <label for="eliminar"></label>
                <button type="button" id="eliminar" wire:click="delete_from_cart()"
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-6 text-sm mr-2">
                    {{ __('Quitar del Carro') }}
                </button>
            </div>
        @endif
    </div>
    @else
        <div class="italic">{{ __('Este producto no se encuentra en Stock') }}</div>
    @endif
</div>



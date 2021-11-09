<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" :value="__('Nombre')"></x-label>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="category" :value="__('Categoria')"></x-label>
                            <x-input id="category" class="block mt-1 w-full"
                                     type="text"
                                     name="category"
                                     required :value="$product->category"></x-input>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Actualizar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
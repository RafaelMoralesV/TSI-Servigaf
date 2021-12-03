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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Nombre')"></x-label>
                            <x-input id="name" class="block mt-1 w-full"
                                     type="text"
                                     name="name"
                                     :value="old('name')"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="category" :value="__('Categoria')"></x-label>
                            <x-input id="category" class="block mt-1 w-full"
                                     type="text"
                                     name="category"
                                     :value="old('category')"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Precio')"></x-label>
                            <x-input id="price" class="block mt-1 w-full"
                                     type="number"
                                     name="price"
                                     :value="old('price')"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="stock" :value="__('Stock Inicial')"></x-label>
                            <x-input id="stock" class="block mt-1 w-full"
                                     type="number"
                                     name="stock"
                                     :value="old('stock') ?? 0"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="image" :value="__('Imagen')"></x-label>
                            <x-input id="image" class="block mt-1 w-full"
                                     type="file"
                                     :value="old('image')"
                                     name="image"></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Descripcion del Producto')"></x-label>
                            <x-textarea id="description" class="block mt-1 w-full "
                                        name="description"
                                        :value="old('description')"></x-textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Crear') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

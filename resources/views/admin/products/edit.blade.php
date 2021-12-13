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
                            @foreach($errors->all() as $error)
                                <x-alerts.error :message="$error" />
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label for="name" :value="__('Nombre')"></x-label>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name"
                                     required></x-input>
                        </div>

                        <div>
                            <x-label for="brand" :value="__('Marca')"></x-label>
                            <x-input id="brand" class="block mt-1 w-full"
                                     type="text"
                                     name="brand"
                                     :value="$product->brand"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="category" :value="__('Categoria')" />
                            <select id="category" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                     type="text"
                                     name="category">
                                <option value="">{{ __('Seleccionar') }}</option>
                                @foreach($groups as $group)
                                    <option value="" disabled>{{ $group->group_name }}</option>
                                    @foreach($group->categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                                            {{ $loop->iteration }} - {{ $category->name }}
                                        </option>
                                    @endforeach
                                    <option value=""> </option>
                                @endforeach
                                <option value="no_category">{{ __('Sin categoría') }}</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Precio')"></x-label>
                            <x-input id="price" class="block mt-1 w-full"
                                     type="text"
                                     name="price"
                                     :value="$product->price"
                                     required></x-input>
                        </div>

                        <div class="mt-4">
                            <x-label for="stock" :value="__('Stock')"></x-label>
                            <x-input id="stock" class="block mt-1 w-full"
                                     type="number"
                                     name="stock"
                                     :value="old('stock') ?? $product->stock"
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
                                        :value="$product->description"></x-textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4 ">
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

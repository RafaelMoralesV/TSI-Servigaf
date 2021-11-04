@extends ('layouts.guest-navigation')

@section('content')
    <x-auth-card>
        <x-slot name="logo"><a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"></x-application-logo>
            </a></x-slot>
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

        <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
            @csrf
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
    </x-auth-card>
@endsection

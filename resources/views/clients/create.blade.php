<x-guest-layout>
    <div class="flex py-12 flex-col sm:flex-row xl:px-64 ">
        <div class="flex-grow sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <x-alerts.error :message="$error" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('client.store') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <x-label for="name" :value="__('Nombre')"/>
                            <x-input name="name" id="name"
                                     class="block w-full"
                                     type="text"
                                     :value="old('name')"
                                     required
                            />
                        </div>

                        <div class="mt-3">
                            <x-label for="email" :value="__('Email')"/>
                            <x-input name="email" id="email"
                                     class="block w-full"
                                     type="text"
                                     :value="old('email')"
                                     required
                            />
                        </div>

                        <div class="inline-block mt-3 w-1/2 pr-1">
                            <x-label for="address" :value="__('Direccion')"/>
                            <x-input name="address" id="address"
                                     class="block w-full"
                                     type="text"
                                     :value="old('address')"
                                     required
                            />
                        </div>

                        <div class="inline-block mt-3 w-1/2 -mx-1 pl-1">
                            <x-label for="city" :value="__('Ciudad')"/>
                            <x-input name="city" id="city"
                                     class="block w-full"
                                     type="text"
                                     :value="old('city')"
                                     required
                            />
                        </div>

                        <div class="mt-3">
                            <x-label for="phone" :value="__('Telefono de Contacto')"/>
                            <x-input name="phone" id="phone"
                                     class="block w-full"
                                     type="text"
                                     :value="old('phone')"
                            />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">{{ __('Opciones de Pago') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl">{{ __('Resumen de tu carrito') }}</h2>
                    @forelse($cart_items as $item)
                        <div>{{ $item->name }}</div>
                    @empty
                        <div>{{ __('No hay nada en el carrito...') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

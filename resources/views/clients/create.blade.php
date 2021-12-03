<x-guest-layout>
    <div class="py-12 flex">
        <div class="flex-grow sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><x-alerts.error>{{ $error }}</x-alerts.error></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('client.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Nombre')"/>
                            <x-input name="name" id="name"
                                     class="block mt-1"
                                     type="text"
                                     :value="old('name')"
                                     required
                            />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">{{ __('Opciones de Pago') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mx-32 sm:px-6 lg:px-8">
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

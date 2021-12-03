<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white">
                    <livewire:shopping-cart/>
                    <div class='text-center'>
                        <button type="button"
                                @if($products->isNotEmpty())
                                onclick="window.location='{{ route('client.create') }}'"
                                class="flex ml-auto w-min h-min text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-6 text-sm mr-2"
                                @else
                                disabled
                                class="flex ml-auto w-min h-min text-white bg-red-300 border-0 py-2 px-6 rounded mt-6 text-sm mr-2 cursor-default"
                            @endif
                        >
                            {{ __('Ir al Checkout') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

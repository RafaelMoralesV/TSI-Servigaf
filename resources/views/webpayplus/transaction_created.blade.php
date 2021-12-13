<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center flex-col">
                    <h1 class="text-4xl font-mono mx-auto">Continuar a:</h1>
                    <form class="mx-auto" action="{{ $resp->getUrl() }}" method="POST">
                        <input type="hidden" name="token_ws" value="{{ $resp->getToken() }}">
                        <input type="image" src="{{ asset('logos/webpay-cl.jpg') }}" alt="{{ __('Ir a Webpay') }}" ></input>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

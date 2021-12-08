<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Estas en Transbank/create_transaction
                    <br>
                    {{ $resp->token }}
                    <br>
                    {{ $resp->url }}

                    <form action="{{ $resp->getUrl() }}" method="POST">
                        <input type="hidden" name="token_ws" value="{{ $resp->getToken() }}">
                        <button type="submit">{{ __('Ir a Webpay') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

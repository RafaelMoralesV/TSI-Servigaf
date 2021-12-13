<x-guest-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border border-gray-100">
                    <h1 class="font-bold text-5xl mb-8">Gracias por tu compra!</h1>
                    <div class="text-lg">
                    <p>Enviaremos tu producto lo más pronto posible. Nos contactaremos contigo para poder lograrlo.
                        En caso de que tengas problemas con tu envío o producto, contáctanos por los canales que
                        aparecen más abajo, y te responderemos por tus dudas.
                    </p>
                    <br>
                    <p>Tu boleta la puedes encontrar más abajo. Es importante que la guardes. Muchas gracias!</p>
                    <br>
                    </div>
                    <a href="{{ route('boleta', Session::get('transaction')->buy_order) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Obtener mi boleta') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

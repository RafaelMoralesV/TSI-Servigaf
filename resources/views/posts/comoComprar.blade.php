<x-guest-layout>
    <x-slot name='styles'>
        <style>
            input[type='number']::-webkit-inner-spin-button,
            input[type='number']::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            #agregaralcarro {
                position: relative;
                left: 40px;
            }

            .custom-number-input input:focus {
                outline: none !important;
            }

            .custom-number-input button:focus {
                outline: none !important;
            }
        </style>
    </x-slot>
    <section class="text-gray-700 body-font overflow-hidden bg-white  ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-4xl font-mono">¿Cómo comprar?</h1>
                        <br>
                        <br>
                        <div class="flex justify-center flex-col">
                        <p class="text-lg font-sans">
                            Comprar un producto en nuestro sitio es muy sencillo, lo primero es encontrar el producto mediante el buscador o gracias a las categorias, luego de eso podemos acceder al carrito de compras donde podremos revisar los contenidos agregados anteriormente. 
                            <br>
                            Una vez listo procederemos al Checkout donde se pedirán sus datos, asegurate de ingresarlos correctamente ya que estos serán los utilizados para el posterior contacto y envío.
                            <br>
                            Serás redireccionado a la página de Webpay donde podrás realizar el pago, posteriormente se te redireccionará a una página donde recibirás tu boleta electrónica, tu pedido será confirmado lo antes posible y se te enviará un correo cuando esto suceda.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
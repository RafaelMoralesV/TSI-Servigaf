<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
{{ $styles ?? '' }}

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="flex flex-col min-h-screen">
@include('layouts.guest-navigation')
<main class="flex-grow flex flex-col font-sans text-gray-900 antialiased">
    {{ $slot }}
</main>
<footer class="bg-gray-900 py-8 border-t border-gray-400 w-full justify-center">
    <div class="">
        <div class="flex">
            <div class="flex lg:w-1/2 justify-center ">
                <div class="px-3 md:px-0">
                    <h3 class="font-bold text-white">Servigaf</h3>
                    <ul class="list-reset items-center pt-3 text-white">
                        <li><a class="no-underline hover:text-gray-200 hover:underline py-1 "
                               href=https://www.google.com/maps/place/San+Francisco+2252,+Santiago,+Regi%C3%B3n+Metropolitana/@-33.4744813,-70.6458222,17z/data=!3m1!4b1!4m5!3m4!1s0x9662c547a0b452ef:0x66db483c6f2fc61e!8m2!3d-33.4744813!4d-70.6436282>San
                                Francisco 2252, Santiago, Región Metropolitana
                            </a>
                        </li>
                        <li class="py-4"> {{ __('Teléfono') }} <br>
                            <a class="no-underline hover:text-gray-200 hover:underline py-1" href="tel:22345678">
                                22345678
                            </a>
                        </li>
                        <li><a class="no-underline hover:text-gray-200 hover:underline py-1" href="#">
                                {{ __('Contáctenos') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex w-full lg:w-1/2 lg:justify-center text-white">
                <div class="px-3 md:px-0">
                    <h3 class="font-bold text-gray-900">Información</h3>
                    <ul class="list-reset items-center pt-3">
                        <li><a class="inline-block no-underline hover:text-gray-200 hover:underline py-1" href="{{ route('mediosDePago') }}">
                                {{ __('Medios de pago') }}
                            </a></li>
                        <li><a class="inline-block no-underline hover:text-gray-200 hover:underline py-1" href="{{ route('comoComprar') }}">
                                {{ __('Como comprar') }}
                            </a></li>
                        <li><a class="inline-block no-underline hover:text-gray-200 hover:underline py-1" href="{{ route('envios') }}">
                                {{ __('Envios') }}
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@livewireScripts
</body>
</html>

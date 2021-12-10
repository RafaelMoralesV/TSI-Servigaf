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
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5  mx-auto flex flex-wrap justify-center   ">
                <img alt="{{$product->name}}"
                     class="lg:w-1/2  w-full object-cover object-center rounded border border-gray-200 max-w-xs"
                     src="{{ asset($product->img_path) }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$product->brand}}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
                    <div class="flex mb-4">
                    </div>
                    <span class="title-font font-medium text-2xl text-gray-900">${{$product->price}}</span>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                        <div class="flex">
                            <span class="mr-3 mt-8">{{ __('Medios de pago:') }}</span>
                            <img class="w-20 ml-6" src="{{ asset('logos/webpay-cl.jpg') }}" alt="Webpay">
                        </div>
                        <div class="flex ml-6 items-center">
                        </div>
                    </div>
                    <div class="flex">
                        <livewire:counter :product="$product"/>

                        <div class="flex items-center ml-10 mt-6 mr-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" flex justify-center ">
                <div class="box-border w-3/5 p-4 border-4 justify-center mt-40 md:box-content">
                    <h3 class="text-3x1 title-font text-gray-500 tracking-widest text-center font-medium mb-4">
                        {{ __('DETALLES DEL PRODUCTO') }}
                    </h3>
                    <p class="text-base text-gray-900 ">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

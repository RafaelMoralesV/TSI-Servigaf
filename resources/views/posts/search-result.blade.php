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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            <h1>Search Results</h1>
            {{-- <p class="search-results-count">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p> --}}
{{--     
            @if ($products->total() > 0)
            <table class="table table-bordered table-striped"> --}}
                <tbody>
                    <table class="w-full bg-white shadow-md rounded mb-4">
                        {{-- <thead class="bg-gray-300 font-bold">
                        <tr>
                            <th></th>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Categoria') }}</th>
                            <th>{{ __('Precio') }}</th>
                            <th>{{ __('Stock') }}</th>
                        </tr>
                        </thead> --}}
                        <tbody>
                        @forelse($products as $product)
                            {{-- <tr class="text-center {{ $loop->index % 2 == 1 ? 'bg-gray-100' : '' }}">
                                <td class="py-2 flex content-center justify-center ">
                                    <img class="w-24 h-24 rounded ml-5 mr-10" src="{{ asset($product->img_path) }}" alt="...">
                                    
                                </td>
                                <th scope="row" class="py-5">{{ $product->name }}</th>
                                
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }} ud.</td>
                                
                            </tr> --}}
                            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">

                                <a href="{{ route('guest.product.show', $product) }}">
                                    <img class="hover:grow hover:shadow-lg" src="{{ asset($product->img_path) }}">
                                    <div class="pt-3 flex items-center justify-between">
                                        <p class="">{{$product->name}}</p>
                                    </div>
                                    <p class="pt-1 text-gray-900">${{$product->price}}</p>
                                </a>
            
                            </div>
                        @empty
                            <tr>
                                <th scope="row">#</th>
                                <td>None</td>
                                <td>None</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </tbody>
            </table>
    
            {{-- {{ $products->appends(request()->input())->links() }}
            @endif --}}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
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
            <section class="bg-white py-8">
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                <tbody>
                    <table class="w-full bg-white shadow-md rounded mb-4">
                        <tbody>
                        @forelse($products as $product)
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
                {{ $products->links() }}
                </div>
            </section>
            
    
            {{-- {{ $products->appends(request()->input())->links() }}
            @endif --}}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
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
                
                </div>
            </section>
            
    
            {{-- {{ $products->appends(request()->input())->links() }}
            @endif --}}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
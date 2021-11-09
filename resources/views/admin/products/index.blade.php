<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="my-5 flex justify-end">
                        <a type="button"
                           class="mr-3 text-sm text-white bg-green-400 hover:bg-green-700 rounded py-1 px-2 focus:outline-none focus:shadow-outline"
                           href="{{ route('products.create') }}">{{ __("Crear nuevo producto") }}</a>
                        <a type="button"
                           class="mr-3 text-sm text-white bg-red-400 hover:bg-red-700 rounded py-1 px-2 focus:outline-none focus:shadow-outline"
                           href="#">{{ __("Ver productos eliminados") }}</a>
                    </div>

                    <table class="w-full bg-white shadow-md rounded mb-4">
                        <thead class="bg-gray-300 font-bold">
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Categoria') }}</th>
                            <th>{{ __('Editar') }}</th>
                            <th>{{ __('Eliminar') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr class="text-center {{ $loop->index % 2 == 1 ? 'bg-gray-100' : '' }}">
                                <th scope="row" class="py-5">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <a type="button"
                                       class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                       href="{{ route('products.edit', $product) }}">
                                        {{ __('Editar') }}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row">#</th>
                                <td>None</td>
                                <td>None</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

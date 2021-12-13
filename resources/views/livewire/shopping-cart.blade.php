<div class='flex flex-col'>
<table class="w-full bg-white shadow-md rounded mb-4">
    <thead class="bg-gray-300 font-bold">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Nombre y Categoria') }}</th>
        <th>{{ __('Precio') }}</th>
        <th>{{ __('Cantidad') }}</th>
        <th>{{ __('Opciones') }}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr class="text-center {{ $loop->index % 2 == 1 ? 'bg-gray-100' : '' }}">
            <th scope="row" class="py-5">{{ $product->id }}</th>
            <td class="py-2 flex content-center">
                <img class="w-12 h-12 rounded ml-5 mr-10" src="{{ asset($product->img_path) }}" alt="...">
                <div class="flex flex-col">
                    <div class="font-bold">{{ $product->name }}</div>
                    <div class="italic">{{ $product->category }}</div>
                </div>
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->qty }}</td>
            <td>
                <div class="flex flex-row justify-center">
                    <form wire:submit.prevent="remove_from_cart('{{ $product->rowId }}')">
                        <button type="submit"
                                class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Eliminar') }}
                        </button>
                    </form>
                </div>
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
    <div class="flex items-center justify-end mt-4">
        <h3 class="text-xl font-bold">Envio: $3,000</h3>
    </div>
    <div class="flex items-center justify-end mt-4">
        <h3 class="text-xl font-bold">{{ __('Total: $') . $total . ' + 3,000'}} </h3>
        <button type="button"
                @if($products->isNotEmpty())
                onclick="window.location='{{ route('client.create') }}'"
                class="ml-3 py-3 flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-sm mr-2"
                @else
                disabled
                class="ml-3 py-3 flex text-white bg-red-300 border-0 py-2 px-6 rounded text-sm mr-2 cursor-default"
            @endif
        >
            {{ __('Datos de Envío') }}
        </button>
    </div>
</div>

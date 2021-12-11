<tr class="text-center {{ $iteration % 2 == 1 ? '' : 'bg-gray-100' }}">
    <th scope="row" class="py-5">{{ $iteration }}</th>
    <td>{{ $category->name }}</td>
    <td>{{ __('Categoría de Producto') }}</td>
    <td><a type="button"
           class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
           href="{{ route('categories.show', $category) }}">
            {{ __('Ver categoría') }}
        </a></td>
</tr>

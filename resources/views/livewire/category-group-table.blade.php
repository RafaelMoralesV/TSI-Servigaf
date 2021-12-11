<div class="p-6 bg-white border-b border-gray-200">
    <div class="my-4 w-full flex justify-center">
        <form action="{{ route('categories.group') }}" method="POST">
            @csrf
            @method('POST')
            <x-label for="group_name">{{ __('Nuevo nombre de grupo') }}</x-label>
            <x-input type="text" id="group_name"/>

            <x-button class="ml-8">{{ __('Crear nuevo Grupo') }}</x-button>
        </form>
    </div>
    <table class="w-full bg-white shadow-md rounded mb-4">
        <thead class="bg-gray-300 font-bold">
        <tr>
            <th>{{ __('#') }}</th>
            <th>{{ __('Nombre') }}</th>
            <th>{{ __('Tipo') }}</th>
            <th>{{ __('Numero de Productos') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($groups as $group)
            <tr class="text-center bg-blue-100">
                <th scope="row" class="py-5">#</th>
                <td>{{ $group->group_name }}</td>
                <td>{{ __('Grupo de Categorías') }}</td>
                <td>{{ $group->products_count }}</td>
                <td><a type="button"
                       class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                       href="{{ route('categories.show', $group) }}">
                        {{ __('Ver grupo') }}
                    </a>
                    <button type="button"
                            class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Eliminar') }}
                    </button>
                </td>
            </tr>
            @forelse($group->categories as $category)
                <tr class="text-center {{ $loop->index % 2 == 1 ? 'bg-gray-100' : '' }}">
                    <th scope="row" class="py-5">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ __('Categoría de Producto') }}</td>
                    <td>{{ $category->products->count() }}</td>
                    <td>
                        <button type="button"
                                class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                wire:click="destroy_category({{$category}})"
                        >
                            {{ __('Eliminar') }}
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">#</th>
                    <td>{{ __('Este grupo no posee categorías') }}</td>
                    <td>...</td>
                </tr>
            @endforelse
            <tr><livewire:create-category-form :group-id="$group->id" /></tr>
        @empty
            <tr>
                <th>#</th>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>...</th>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $groups->links() }}
</div>

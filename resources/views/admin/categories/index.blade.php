<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::has('message'))
                        <x-alerts.success :message="Session::get('message')"/> @endif
                    <div class="my-4 w-full flex justify-center">
                        <form action="{{ route('groups.store') }}" method="POST">
                            @csrf
                            <x-label for="group_name">{{ __('Nuevo nombre de grupo') }}</x-label>
                            <x-input type="text" id="group_name" name="group_name"/>

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
                        @forelse($categoryGroups as $group)
                            <tr class="text-center bg-blue-100">
                                <th scope="row" class="py-5">#</th>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ __('Grupo de Categorías') }}</td>
                                <td>{{ $group->products_count }}</td>
                                <td>
                                    <form action="{{ route('groups.destroy', $group) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @forelse($group->categories as $category)
                                <tr class="text-center {{ $loop->index % 2 == 1 ? 'bg-gray-100' : '' }}">
                                    <th scope="row" class="py-5">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ __('Categoría de Producto') }}</td>
                                    <td>{{ $category->products->count() }}</td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                {{ __('Eliminar') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ __('Este grupo no posee categorías') }}</td>
                                    <td>...</td>
                                </tr>
                            @endforelse
                            <tr @if($group->categories->count() % 2 == 1) class="bg-gray-100" @endif>
                                <th scope="row">[#]</th>
                                <td colspan="4" class="w-full text-center py-3">
                                    <form action="{{ route('categories.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="category_group_id" value="{{ $group->id }}">
                                        <x-label for="name">{{ __('Nueva categoría') }}</x-label>
                                        <x-input type="text" id="name" name="name"/>
                                        <x-button class="ml-8">{{ __('Crear') }}</x-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>#</th>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $categoryGroups->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

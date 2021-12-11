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

                    <div class="my-4 w-full flex justify-center">
                        <form action="{{ route('categories.group') }}" method="POST">
                            @csrf
                            @method('POST')
                            <x-label for="group_name">{{ __('Nuevo nombre de grupo') }}</x-label>
                            <x-input type="text" id="group_name" />

                            <x-button class="ml-8">{{ __('Crear nuevo Grupo') }}</x-button>
                        </form>
                    </div>

                    <table class="w-full bg-white shadow-md rounded mb-4">
                        <thead class="bg-gray-300 font-bold">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Tipo') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categoryGroups as $group)
                            <tr class="text-center bg-blue-100">
                                <th scope="row" class="py-5">#</th>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ __('Grupo de Categorías') }}</td>
                                <td><a type="button"
                                       class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                       href="{{ route('categories.show', $group) }}">
                                        {{ __('Ver grupo') }}
                                    </a></td>
                            </tr>
                            @forelse($group->categories as $category)
                                <livewire:category-group-row :category="$category" :iteration="$loop->iteration" />
                            @empty
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ __('Este grupo no posee categorías') }}</td>
                                    <td>...</td>
                                </tr>
                            @endforelse
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

                    {{ $categoryGroups->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

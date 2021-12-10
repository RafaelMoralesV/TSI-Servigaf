<nav x-data="{ open: false }">
    <!-- Logos and Search bar -->
    <div class="flex justify-between bg-white text-black w-full">
        <div class="px-5 lg:px-12 py-6 flex w-full items-center">
            <div class="lg:ml-24"><x-application-logo /></div>
            <!-- < Barra de busqueda > -->
            <div class="pt-2 relative mx-auto text-gray-600">
                <label>
                    <form action="{{route('search')}}" method="GET" class="search-form">
                    <input
                        class="border-2 border-gray-300 bg-white h-10 w-full px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="text" name="search" value="{{request()->input('search')}}" placeholder="{{ __('Buscar') }}">
                        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                 viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                 xml:space="preserve"
                                 width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                          </svg>
                        </button>
                    </form>
                </label>

            </div>
        </div>
        <div class="hidden lg:flex items-center space-x-5 items-center mr-5 lg:mr-44 ">
            <x-guest.nav-cart-icon/>
            <!-- Sign In / Register      -->
            <a class="flex items-center hover:text-gray-200" href="{{ route("login") }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 hover:text-gray-200" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Nav Links -->
    <div class="flex justify-between bg-gray-900 text-white w-full">
        <div class="px-5 lg:px-12 flex w-full items-center lg:ml-24 ">
            <ul class="hidden lg:flex px-6 mx-left ml-5 font-semibold font-heading space-x-12">
                @foreach ($groups as $group)
                <x-guest.nav-link :items='$group->categories'><a href="{{ route('mostrar_categoria', $group->group_name) }}">{{ $group->group_name }}</a></x-guest.nav-link>
                @endforeach
                <x-guest.nav-link >{{ __('Otros') }}</x-guest.nav-link>
            </ul>
        </div>

        <x-guest.nav-cart-icon :class="'lg:hidden'"/>

        <!-- Hamburger -->
        <button @click="open = ! open" class="navbar-burger self-center mr-12 lg:hidden py-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Responsive navbar -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-guest.responsive-nav-link>
                {{ __('Categoria 1') }}
            </x-guest.responsive-nav-link>
            <x-guest.responsive-nav-link>
                {{ __('Categoria 2') }}
            </x-guest.responsive-nav-link>
            <x-guest.responsive-nav-link>
                {{ __('Categoria 3') }}
            </x-guest.responsive-nav-link>
            <x-guest.responsive-nav-link>
                {{ __('Categoria 4') }}
            </x-guest.responsive-nav-link>
        </div>
    </div>
</nav>


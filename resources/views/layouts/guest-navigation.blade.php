<!-- navbar -->
<nav class="flex justify-between bg-white text-black w-full">
    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        <div class="lg:ml-24">
            <x-application-logo></x-application-logo>
        </div>
        <!-- < Barra de busqueda > -->
        <div class="pt-2 relative mx-auto text-gray-600">
            <label>
                <input
                    class="border-2 border-gray-300 bg-white h-10 w-full px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="{{ __('Buscar') }}">
            </label>
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
        </div>
    </div>
    <!-- Header Icons -->
    <div class="hidden xl:flex items-center space-x-5 items-center mr-5 lg:mr-44 ">
        <a class="flex items-center hover:text-gray-200" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span class="flex absolute -mt-6 ml-7">
                    <span class="animate-ping absolute inline-flex h-4 w-4 rounded-full bg-pink-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                      </span>
                    </span>
        </a>
        <!-- Sign In / Register      -->
        <a class="flex items-center hover:text-gray-200" href="{{ route("login") }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 hover:text-gray-200" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </a>
    </div>
</nav>
<nav class="flex justify-between bg-gray-900 text-white w-full">
    <div class="px-5 xl:px-12 py-6 flex w-full items-center lg:ml-24 ">
        <!-- Nav Links -->
        <ul class="hidden md:flex px-6 mx-left ml-5 font-semibold font-heading space-x-12">
            <li class="group relative dropdown hover:text-gray-200 tracking-wide"><a href="#">Categoria 1</a>
                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-30">
                    <ul class="top-0 w-48 bg-gray-900 shadow px-6 py-8">
                        <li class="py-1"><a class="block cursor-pointer">Item 1</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 2</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 3</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 4</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 5</a></li>
                    </ul>
                </div>
            </li>
            <li class="group relative dropdown hover:text-gray-200 tracking-wide"><a href="#">Categoria 2</a>
                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-30">
                    <ul class="top-0 w-48 bg-gray-900 shadow px-6 py-8">
                        <li class="py-1"><a class="block cursor-pointer">Item 1</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 2</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 3</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 4</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 5</a></li>
                    </ul>
                </div>
            </li>
            <li class="group relative dropdown hover:text-gray-200 tracking-wide"><a href="#">Categoria 3</a>
                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-30">

                    <ul class="top-0 w-48 bg-gray-900 shadow px-6 py-8">
                        <li class="py-1"><a class="block cursor-pointer">Item 1</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 2</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 3</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 4</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 5</a></li>
                    </ul>
                </div>
            </li>
            <li class="group relative dropdown hover:text-gray-200 tracking-wide"><a href="#">Categoria 4</a>
                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-30">
                    <ul class="top-0 w-48 bg-gray-900 shadow px-6 py-8">
                        <li class="py-1"><a class="block cursor-pointer">Item 1</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 2</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 3</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 4</a></li>
                        <li class="py-1"><a class="block cursor-pointer">Item 5</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- Responsive navbar -->
    <a class="xl:hidden flex mr-6 items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span class="flex absolute -mt-5 ml-4">
                <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                </span>
              </span>
    </a>
    <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </a>
</nav>

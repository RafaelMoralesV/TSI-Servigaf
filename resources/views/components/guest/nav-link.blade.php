@props(['items' => []])
<li class="group relative dropdown hover:text-gray-200 tracking-wide py-6 cursor-pointer">
    <a href="#">{{ $slot }}</a>
    @if(!empty($items))
    <div class="group-hover:block dropdown-menu absolute hidden h-auto z-30">
        <ul class="top-0 w-48 bg-gray-900 shadow px-6 py-8">
            @forelse($items as $item)
                <li class="py-1">
                    <a class="block cursor-pointer" href="{{ route('mostrar_categoria', $item->name) }}">
                        {{ $item->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
</li>

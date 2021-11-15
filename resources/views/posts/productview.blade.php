@extends ('layouts.guest-navigation')


@section('content')
<title>{{$product->name}}</title>
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="{{$product->name}}" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ asset($product->img_path) }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$product->name}}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
          <div class="flex mb-4">
          </div>
          <span class="title-font font-medium text-2xl text-gray-900">${{$product->price}}</span>
          <p class="leading-relaxed">{{$product->description}}</p>

          {{-- botones --}}

          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3 mt-8">Medios de pago:</span>
              <img class="w-20 ml-6" src= "{{ asset('logos/webpay-cl.jpg') }}">
            </div>
            <div class="flex ml-6 items-center">  
            </div>
          </div>
          <div class="flex">
            

            <div class=" flex imput-group text-center mb-3 ml-5">
                <div class="custom-number-input h-10 w-32">
                    <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Cantidad
                    </label>
                    <div class="flex flex-row h-10 w-32 rounded-lg relative bg-transparent mt-1">
                      <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                      </button>
                      <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0" min="0" max="{{$product->stock}}"></input>
                    <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                      <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                    
                  </div>
                  
                  
            
          </div>
          <label for="agregaralcarro"></label>
          <button id="agregaralcarro" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-8 text-sm">Agregar al carro</button>
          <div  class="flex items-center ml-12 mt-7">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    #agregaralcarro{
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
  <script>
    function decrement(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value)
      if(value>0){
      let value = Number(target.value);
      value--;
      target.value = value;
      }
    }
  
    function increment(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      let value = Number(target.value)
      if(value>stock){
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      value++;
      target.value = value;
      }
    }
  
    const decrementButtons = document.querySelectorAll(
      `button[data-action="decrement"]`
    );
  
    const incrementButtons = document.querySelectorAll(
      `button[data-action="increment"]`
    );
  
    decrementButtons.forEach(btn => {
      btn.addEventListener("click", decrement);
    });
  
    incrementButtons.forEach(btn => {
      btn.addEventListener("click", increment);
    });
  </script>

@endsection
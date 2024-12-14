<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   @if($data['product_category'] == 'merch')
                    <p class="text-white">Gracias por su compra! Recibiras un mail con los datos y la fecha aproximada de llegada de tu pedido:</p>
                    <p class="text-white">Producto: "{{$data['product_name']}}"</p>
                    <p class="text-white">Precio: {{$data['product_amount']}}€</p>
                   @elseif ($data['product_category'] == 'skin')
                    <p class="text-white">Gracias por su compra! Ya tienes disponible tu nueva skin:</p>
                    <p class="text-white">Skin: "{{$data['product_name']}}"</p>
                    <p class="text-white">Precio: {{$data['product_amount']}}€</p>
                   @else

                   @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

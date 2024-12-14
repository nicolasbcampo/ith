@extends('layouts.pagina')

@section('title')
    Merch -
@endsection

@section('content')
<!-- Merch -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Merchandising</h2>
        <p class="mt-1 text-white dark:text-white">Consegue o merch oficial de ITH</p>
    </div>
</div>

<div class="w-full flex flex-row pb-20">
    <div class="w-4/5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto">

        @foreach ($data['products'] as $product)
            @if ($product->name != 'Premium')
                <div class="bg-white rounded overflow-hidden shadow-md cursor-pointer hover:scale-[1.02] transition-all">
                    <div class="w-full aspect-w-16 aspect-h-8 lg:h-80 flex justify-center py-2">
                        <img src="{{$product->images[0]}}" alt="Product 1"
                            class="h-full  object-cover object-top" />
                    </div>

                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 py-3">{{$product->name}}</h3>
                        <div class=" flex items-center  justify-center flex-wrap gap-2 w-full">
                            <a href="{{ route('checkout', ['price' => $product->default_price , 'product' => $product->id]) }}"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-rojo-ith text-white hover:bg-white disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-white dark:hover:text-rojo-ith dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Comprar
                            </a>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</div>
@endsection

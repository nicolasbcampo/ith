@extends('layouts.pagina')

@section('title')
    Tenda -
@endsection

@section('content')


    <!-- Pricing -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Plans de subscrición</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Escolle o plan que mellor se adapte ás túas necesidades</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="mt-12 grid sm:grid-cols-1 lg:grid-cols-3 gap-6 lg:items-center">
            <!-- Card Mensual -->
            <div class="flex flex-col border border-rojo-ith text-center rounded-xl p-8 dark:border-rojo-ith">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Mensual</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    2.99
                    <span class="font-bold text-2xl -me-2">€</span>
                </span>
                <p class="mt-2 text-sm text-white">Sen compromiso. Cancela cando queiras</p>

                <a href="{{ route('checkout', ['price' => 'price_1QSt5KL2VrFy0IgCuxKCaYXa', 'product' => 'prod_RLaFaj5mL1x35n']) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-indigo-800 hover:bg-rojo-ith disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-rojo-ith dark:hover:text-white dark:text-rojo-ith dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Subscribirse
                </a>
            </div>
            <!-- End Card -->

            <!-- Card Anual -->
            <div class="flex flex-col border-2 border-indigo-600 text-center shadow-xl rounded-xl p-8 dark:border-rojo-ith">
                <p class="mb-3"><span
                        class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-lg text-xs uppercase font-semibold bg-rojo-ith text-white dark:bg-rojo-ith dark:text-white">Máis
                        popular</span></p>
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Anual</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    29.99
                    <span class="font-bold text-2xl -me-2">€</span>
                </span>
                <p class="mt-2 text-sm text-white">Aforra máis dun 15% polo acceso a un ano</p>

                <a href="{{ route('checkout', ['price' => 'price_1QSt5KL2VrFy0IgC2NtOKyYz', 'product' => 'prod_RLaFaj5mL1x35n']) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-rojo-ith text-white hover:bg-white hover:text-rojo-ith disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Subscribirse
                </a>
            </div>
            <!-- End Card -->

            <!-- Card  De Por Vida-->
            <div class="flex flex-col border border-rojo-ith text-center rounded-xl p-8 dark:border-rojo-ith">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">De por vida</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    59.99
                    <span class="font-bold text-2xl -me-2">€</span>
                </span>
                <p class="mt-2 text-sm text-white">Acceso de por vida</p>

                <a href="{{ route('checkout', ['price' => 'price_1QSt5KL2VrFy0IgCBZ7RpUsO', 'product' => 'prod_RLaFaj5mL1x35n']) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-indigo-800 hover:bg-rojo-ith disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-rojo-ith dark:hover:text-white dark:text-rojo-ith dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Subscribirse
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Pricing -->


    <div class="font-sans p-4 w-4/5 text-center ml-auto mr-auto lg:max-w-[1300px] md:max-w-3xl sm:max-w-full">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Skins</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Customiza o teu personaxe</p>
        </div>
        <!-- End Title -->

        <div class="w-full flex flex-row">
            {{-- Skins --}}
            <div class="w-3/5 ">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

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
                                        @if (isset(auth()->user()->getItemByStripeId($product->id)->stripe_product_id))
                                            <a href=""
                                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-rojo-ith bg-white text-rojo-ith pointer-events-none ">
                                                Comprado
                                            </a>
                                        @else
                                            <a href="{{ route('checkout', ['price' => $product->default_price , 'product' => $product->id]) }}"
                                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-rojo-ith text-white hover:bg-white disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-white dark:hover:text-rojo-ith dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                Comprar
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            {{-- end Skins --}}
            {{-- character --}}
            <div class="w-2/5 flex justify-center pl-20">
                <img src="{{asset('assets/images/personaje.png')}}" alt="Product 1"
                                            class="h-full  object-cover object-top" />
            </div>
            {{-- end character --}}
        </div>
    </div>
@endsection

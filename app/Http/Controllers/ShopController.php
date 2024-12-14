<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class ShopController extends Controller
{
    public function __invoke(Request $request)
    {
        $stripe = Cashier::stripe();
        $products = $stripe->products->all();
        $prices = $stripe->prices->all();


        $shop_products = [];
        foreach ($products as $product) {
            if($product->metadata->category == "skin"){
                array_push( $shop_products, $product );
            }
        }

        $data = [
            'products' => $shop_products,
            'prices' => $prices
        ];
        return view('shop')->with('data', $data);
    }
}

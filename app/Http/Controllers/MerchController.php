<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class MerchController extends Controller
{
    public function __invoke(Request $request)
    {
        $stripe = Cashier::stripe();
        $products = $stripe->products->all();
        $merch_products = [];


        foreach ($products as $product) {
            if($product->metadata->category == "merch"){
                array_push( $merch_products, $product );
            }
        }



        $prices = $stripe->prices->all();

        $data = [
            'products' => $merch_products,
            'prices' => $prices
        ];
        return view('merch')->with('data', $data);
    }
}

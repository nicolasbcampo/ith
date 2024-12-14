<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class SuccessController extends Controller
{
    public function __invoke(Request $request, string $product = '', string $price = ''){


        $stripe = Cashier::stripe();
        $product_name = $stripe->products->retrieve($product,[])->name;
        $price_amount = $stripe->prices->retrieve($price,[])->unit_amount/100;
        $product_category = $stripe->products->retrieve($product,[])->metadata->category;



        if ($product_category == 'skin'){
            $item = new Item();
            $item->name = $product_name;
            $item->stripe_product_id = $product;
            $item->save();

            $request->user()->items()->attach($item);
        }



        $data = [
            'product' => $product,
            'product_name' => $product_name,
            'product_amount' => $price_amount,
            'product_category' => $product_category
        ];


        return view('success')->with('data', $data);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $price = 'price_1QSt5KL2VrFy0IgC2NtOKyYz', string $product = 'prod_RLaFaj5mL1x35n')
    {
        $stripe = Cashier::stripe();
        $produ = $stripe->products->retrieve($product, []);

        if($produ->metadata->category == 'skin' || $produ->metadata->category == 'merch'){
            return $request->user()
            ->checkout($price, [
                'success_url' => route('success',['product' => $product, 'price' => $price]),
                'cancel_url' => route('shop'),
            ]);
        }else {
            return $request->user()
            ->newSubscription($product, $price)
            ->checkout([
                'success_url' => route('success'),
                'cancel_url' => route('shop'),
            ]);
        }

    }
}

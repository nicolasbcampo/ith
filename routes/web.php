<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SuccessController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome')
    ->name('inicio');

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google_auth');

Route::get('/google-auth/callback', function () {
    $google_user = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'google_id' => $google_user->id,
    ], [
        'name' => $google_user->name,
        'email' => $google_user->email,
    ]);

    Auth::login($user);

    return redirect('/dashboard');

    // $user->token
});

Route::get('shop', ShopController::class)
    ->middleware(['auth', 'verified'])
    ->name('shop');

Route::get('checkout/{price}/{product}', CheckoutController::class)
    ->middleware(['auth', 'verified'])
    ->name('checkout');


Route::get('success/{product?}/{price?}', SuccessController::class)
    ->middleware(['auth', 'verified'])
    ->name('success');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('merch', MerchController::class)
    ->middleware(['auth', 'verified'])
    ->name('merch');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

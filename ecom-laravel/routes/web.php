<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/account', function () {
    return view('pages.account');
})->name('account');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/brands', function () {
    return view('pages.brands');
})->name('brands');

Route::get('/categories', function () {
    return view('pages.categories');
})->name('categories');

Route::get('/category/{category}', function ($category) {
    return view('pages.category', compact('category'));
})->name('category');

Route::get('/flash-sale', function () {
    return view('pages.flash-sale');
})->name('flash-sale');

Route::get('/careers', function () {
    return view('pages.careers');
})->name('careers');

Route::get('/press', function () {
    return view('pages.press');
})->name('press');

Route::get('/sustainability', function () {
    return view('pages.sustainability');
})->name('sustainability');

Route::get('/store-locator', function () {
    return view('pages.store-locator');
})->name('store-locator');

Route::get('/login-flow', function () {
    return view('pages.login-flow');
})->name('login-flow');

// Seller routes
Route::prefix('seller')->group(function () {
    Route::get('/login', function () {
        return view('seller.login');
    })->name('seller.login');

    Route::get('/register', function () {
        return view('seller.register');
    })->name('seller.register');

    Route::get('/dashboard', function () {
        return view('seller.dashboard');
    })->name('seller.dashboard');

    Route::get('/forgot-password', function () {
        return view('seller.forgot-password');
    })->name('seller.forgot-password');
});

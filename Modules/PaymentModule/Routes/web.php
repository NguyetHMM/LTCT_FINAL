<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('paymentmodule')->group(function() {
    Route::get('/', 'PaymentModuleController@index');
    // Route::get('/checkout','PaymentModuleController@show')->name('show');

    //Thuc
    Route::post('/checkout', 'PaymentModuleController@checkout')->name('checkout')->middleware('UserLogin');
    Route::get('/show-payment','PaymentModuleController@show')->name('show-pay')->middleware('UserLogin');
    Route::post('checkout/confirmed','PaymentModuleController@confirmCheckout')->name('confirmCheckout')->middleware('UserLogin');
});

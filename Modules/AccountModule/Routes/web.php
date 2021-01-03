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

Route::prefix('accountmodule')->group(function() {

    // Register function --> done
    Route::get('/register', 'AccountModuleController@register')->name('register');
    Route::post('/register', 'AccountModuleController@storeUser');

    // Login functionn --> done
    Route::get('/login', 'AccountModuleController@login')->name('login');
    Route::post('/login', 'AccountModuleController@authenticate');

    Route::get('logout', 'AccountModuleController@logout')->name('logout')->middleware('UserLogin');

    // Show detail user --> done 
    Route::get('/personalDetails', 'AccountModuleController@personalDetails')->name('personalDetails')->middleware('UserLogin');
    Route::post('/personalDetails', 'AccountModuleController@storeEditUserInfor')->middleware('UserLogin');

    // History orders of an user
    Route::get('/orderHistory', 'AccountModuleController@orderHistory')->name('orderHistory')->middleware('UserLogin');
    Route::get('/orderDetails/{order_id}', 'AccountModuleController@orderDetails')->name('orderDetails')->middleware('UserLogin');

    // ADMIN 
    // Quan ly nguoi dung
    Route::get('/all-user', 'AccountModuleController@all_user')->name('all-user')->middleware('UserLogin');

    Route::get('/changeUserRoleToAdmin/{user_id}', 'AccountModuleController@changeUserRoleToAdmin')->middleware('UserLogin');
    Route::get('/cancelAdminRole/{user_id}', 'AccountModuleController@cancelAdminRole')->middleware('UserLogin');

    Route::get('/delete-user/{user_id}', 'AccountModuleController@delete_user')->middleware('UserLogin');

});

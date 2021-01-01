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

    Route::get('logout', 'AccountModuleController@logout')->name('logout');

    // Show detail user --> done 
    Route::get('/personalDetails', 'AccountModuleController@personalDetails')->name('personalDetails');
    Route::post('/personalDetails', 'AccountModuleController@storeEditUserInfor');

    // History orders of an user
    // todo: show detail an ordered
    Route::get('/orderHistory', 'AccountModuleController@orderHistory')->name('orderHistory');

    // ADMIN 
    // Quan ly nguoi dung
    Route::get('/all-user', 'AccountModuleController@all_user')->name('all-user');

    Route::get('/changeUserRoleToAdmin/{user_id}', 'AccountModuleController@changeUserRoleToAdmin');
    Route::get('/cancelAdminRole/{user_id}', 'AccountModuleController@cancelAdminRole');

    Route::get('/delete-user/{user_id}', 'AccountModuleController@delete_user');

});

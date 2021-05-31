<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return redirect()->route('login');
});

Route::get('login','Auth\LoginController@index')->name('login');

Route::post('authenticate', 'Auth\LoginController@authenticate')->name('authenticate');

Route::middleware('auth')->group(function(){
    
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::prefix('profile')->group(function(){
        Route::get('','Auth\ProfileController@index')->name('profile.index');
        Route::put('info/{user}','Auth\ProfileController@updateInfo')->name('profile.update-info');
        Route::put('password/{user}','Auth\ProfileController@updatePassword')->name('profile.update-password');
    });

    Route::middleware('isManager')->group(function(){
        Route::resource('stores', 'StoreController');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('stocks', 'StockController');
        Route::resource('receipts', 'ReceiptController');
        Route::resource('items', 'ItemController');
        Route::get('receipts', 'ReceiptController@index')->name('receipts.index');
        Route::get('entrances', 'EntranceLogController@index')->name('entrances.index');
        Route::post('products/add', 'ProductController@add')->name('products.add');
        Route::get('items/receipt/{receiptId}','ItemController@index')->name('items.index');
    });

    Route::middleware('isOperator')->group(function () {

        Route::get('sells', 'SellController@index')->name('sells.index');

        Route::post('sells', 'SellController@checkout')->name('sells.checkout');

    });

    Route::group(['middleware' => ['auth', 'web']], function () {

        Route::resource('users', 'UserController');
        
    });




});




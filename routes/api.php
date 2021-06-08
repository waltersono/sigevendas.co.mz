<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products/search/{store}/{category}', 'ProductController@search');

Route::get('categories/search/{storeId}', 'CategoryController@search');

Route::get('sells/searchProduct/{productName}/{operatorId}', 'SellController@searchProduct');

Route::get('receipts/search/{storeId}/{operatorId}/{day}/{month}/{year}', 'ReceiptController@search');

Route::get('stats/search/{storeId}/{month}', 'StatController@search');

Route::get('entranceLogs/search/{storeId}/{day}/{month}/{year}', 'EntranceLogController@search');

Route::get('dashboard/{storeId}', 'DashboardController@getData');

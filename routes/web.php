<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DecorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('catalog', [CatalogController::class, 'page']);

Route::get('catalog/add-item/{id}', [CatalogController::class, 'addItem']);

Route::get('cart', [CartController::class, 'cart']);

Route::patch('catalog/calculate-item/{product_id}/{operator}', [CatalogController::class, 'calculateItem']);

Route::get('tg', 'App\Http\Controllers\TelegramController@me');
Route::any('tg/send', 'App\Http\Controllers\TelegramController@sendMessage');

Route::any('decor', [DecorController::class,'decor']);
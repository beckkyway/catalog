<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

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

Route::get('catalog/remove-item/{id}', [CatalogController::class, 'removeItem']);


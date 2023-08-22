<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

use App\Models\Product;


class CartController extends Controller
{
    // сделать проверку куков существуют ли они
    public function cart()
    {
        if (isset($_COOKIE['cart'])) {
            $cartItems = json_decode($_COOKIE['cart'], true);
            $product = Product::whereIn('id', $cartItems)->get();

            // dd($product);
        } else {
            dd("товара нет");
        }

        return view('cart', [
            'product' => $product
        ]);
    }
}

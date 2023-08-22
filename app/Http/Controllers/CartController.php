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
            $productIds = array_keys($cartItems);
            $products = Product::whereIn('id', $productIds)->get();
            $cartItemQuantities = [];
    
            foreach ($products as $product) {
                if (isset($cartItems[$product->id])) {
                    $product->quantity = $cartItems[$product->id];
                    $cartItemQuantities[$product->id] = $cartItems[$product->id];
                } else {
                    $cartItemQuantities[$product->id] = 0;
                }
            }
        } else {
            dd("товара нет");
        }
    
        return view('cart', [
            'product' => $products,
            'quantities' => $cartItemQuantities
        ]);
    }
}

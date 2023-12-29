<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use App\Services\CartService;

use App\Models\Product;


class CartController extends Controller
{
    public CartService $service;

    public function __construct()
    {
        $this->service = new CartService;
    }

    // сделать проверку куков существуют ли они
    public function cart()
    {
        if (!isset($_COOKIE['cart'])) {
            dd("Товара нет");
        }
        
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
    
        return view('cart', [
            'product' => $products,
            'quantities' => $cartItemQuantities,
            'allPrice' => $this->service->calculatePrice(),
        ]);
    }


}

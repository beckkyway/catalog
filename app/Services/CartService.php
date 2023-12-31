<?php

namespace App\Services;
use App\Models\Product;
 
class CartService
{
    public function calculatePrice()
    {
        if (!isset($_COOKIE['cart'])) {
            return;
        }
        $price = 0;
        $arr = json_decode($_COOKIE['cart'], true);
        
        foreach ($arr as $key => $item) {
            $product = Product::find($key);
            $price += $product->getPrice() * $item;
        }

        return $price;
    }

    public function getQuantity()
    {
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

        return [
            'products' => $products, 
            'quantities' => $cartItemQuantities
        ];
    }
}
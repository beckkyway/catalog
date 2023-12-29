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
}
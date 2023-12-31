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
        
        $qua = $this->service->getQuantity();
    
        return view('cart', [
            'product' => $qua['products'],
            'quantities' => $qua['quantities'],
            'allPrice' => $this->service->calculatePrice(),
        ]);
    }


}

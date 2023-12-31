<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use App\Services\CartService;

use App\Models\Product;

class DecorController extends Controller
{
    public CartService $service;

    public function __construct()
    {
        $this->service = new CartService;
    }

    public function decor(Request $request)
    {
        $qua = $this->service->getQuantity();
        return view('decor', [
            'allPrice' => $this->service->calculatePrice(),
            'product' => $qua['products'],
            'quantities' => $qua['quantities'],
        ]);
    }
}
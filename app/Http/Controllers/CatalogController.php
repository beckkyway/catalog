<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Throwable;

class CatalogController extends Controller
{
    public function page()
    {
        $model = Product::orderBy('price')->get();

        return view('catalog', [
            'model' => $model
        ]);
    }

    public function addItem($id)
    {
        if (!Product::where('id', $id)->exists()) {
            return response()->json([
                'error' => "Такого товара нет"
            ], 400);
        }

        $items = json_decode($_COOKIE['cart'] ?? "{}", true);

        if (isset($items[$id])) {
            $items[$id] += 1;
        } else {
            $items[$id] = 1;
        }

        $jsonString = json_encode($items);
        setcookie('cart', $jsonString, time() + 3600);
        // $_COOKIE['cart'] = $jsonString;

        return response()->json([
            'count' => array_sum($items),
            'items' => $items,
            'item' => Product::find($id)->toArray(),
        ], 200);
    }
}

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
        $model = Product::all();

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

        return response()->json([
            'count' => array_sum($items),
            'items' => $items,
        ], 200);
    }

    public function calculateItem(int $product_id, string $operator)
    {
        $items = json_decode($_COOKIE['cart'] ?? "{}", true);
    
        if (isset($items[$product_id])) {
            $items[$product_id] += $operator == "plus" ? 1 : -1;
        } else {
            if ($operator === "plus") {
                $items[$product_id] = 1;
            }
        }
    
        if ($items[$product_id] < 1) {
            unset($items[$product_id]);
        }
    
        return response()->json([
            'success' => 1,
            'items' => $items
        ]);
    }
}
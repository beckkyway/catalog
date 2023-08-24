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
            'item' => Product::find($id)->toArray(),
        ], 200);
    }

    public function calculateItem($id, $operator = true)
    {
        $items = json_decode($_COOKIE['cart'] ?? "{}", true);
    
        // Проверяем, есть ли товар в корзине
        if (!isset($items[$id])) {
            $items[$id] = 0;
        }
    
        // Если $operator равно true, увеличиваем количество товара на 1
        // Если $operator равно false, уменьшаем количество товара на 1
        $items[$id] += $operator ? 1 : -1;
    
        // Если количество товара меньше или равно 0, удаляем товар из корзины
        if ($items[$id] <= 0) {
            unset($items[$id]);
        }
    
        // Сохраняем обновленный список товаров в куки
        setcookie('cart', json_encode($items), time() + (86400 * 30), "/"); // Устанавливаем куки на 30 дней
    
        // Возвращаем обновленные данные о товаре
        return response()->json(['items' => $items]);
    }
}
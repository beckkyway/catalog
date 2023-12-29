<?php

namespace App\Http\Controllers;

use WeStacks\TeleBot\Laravel\TeleBot;
use Illuminate\Http\Request;
use Validator;

class TelegramController extends Controller
{
    public function me()
    {
        return Telebot::me();
    }

    public function sendMessage(Request $request)
    {
        

        if ($request->method() === "POST") {
            return $this->sendMessagePost($request);
        }

        return view('tg.index');

        // Telebot::sendMessage([
        //     'chat_id' => '-1002092556700',
        //     'text' => 'Ты лох ебаный'
        // ]);
    }

    private function sendMessagePost(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'message' => 'string|max:255|min:5'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        Telebot::sendMessage([
            'chat_id' => '-1002092556700',
            'text' => $request->message
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}

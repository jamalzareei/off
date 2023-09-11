<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function getHome()
    {
        return view('home');
    }

    public static function getUpdates()
    {
        $updates = Telegram::getUpdates();
        dd($updates);
    }

    public static function send(){
    	Telegram::sendMessage([
            'chat_id' => env('GROUP_ID'),
            'text' => $request->get('message')
        ]);
    }
}
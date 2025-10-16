<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;

use App\Models\Message;
use App\Models\Advert;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->validated());

        // $message = new Message;

        // $message->user_id = $request->user_id;

        // $message->sender_id = $request->sender_id;

        // $message->entry = $request->entry;

        var_dump($message);

        $advert = Advert::where('id', $request->advert_id)->first();

        // return redirect()->route('adverts.page', $advert);
    }
}

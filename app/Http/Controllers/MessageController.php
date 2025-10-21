<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\Message;
use App\Models\Advert;
use App\Models\User;

class MessageController extends Controller
{
    public function index() 
    {
        $messages = Message::query();
        $messages->orderBy('created_at', 'desc')->where('user_id', Auth::id());

        $messages = $messages->count() > 10 ? $messages->paginate(10) : $messages->get();

        // dd($messages);

        $sender_data = [];
        
        foreach ($messages as $message) {
            $sender_data[] = [$message->created_at, User::where('id', $message->sender_id)->first()];
        }

        // dd($messages);

        /*
        @foreach($sender_data as $sender_bit)
            <x-middle_row>{{ $sender_bit[1] }}</x-middle_row>
        @endforeach

        */

        // return view('messages.overview')->with(compact(['messages', 'sender_data ',]));
        return view('messages.overview')->with(compact(['messages',]));
    }

    public function store(StoreMessageRequest $request)
    {
        Message::create($request->validated());        

        $advert = Advert::where('id', $request->advert_id)->first();

        return redirect()->route('adverts.page', $advert);
    }

    public function show(Message $message)
    {
        $sender = User::where('id', $message->sender_id)->first();

        return view('messages.show')->with(compact(['message', 'sender']));
    }
}

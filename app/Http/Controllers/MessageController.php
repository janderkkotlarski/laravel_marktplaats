<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\Message;
use App\Models\Advert;
use App\Models\User;

use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;

use App\Notifications\NewMessage;

class MessageController extends Controller
{
    public function index() 
    {
        $messages = Message::query();
        $messages->orderBy('created_at', 'desc')->where('user_id', Auth::id());
        $messages = $messages->count() > 10 ? $messages->paginate(10) : $messages->get();

        return view('messages.overview')->with(compact(['messages',]));
    }

    public function libs()
    {
        $messages = Message::query();
        $messages->orderBy('created_at', 'desc')->where('sender_id', Auth::id());
        $messages = $messages->count() > 10 ? $messages->paginate(10) : $messages->get();

        return view('messages.sent')->with(compact(['messages',]));
    }

    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->validated());

        if ($message->user->notify) {
            Notification::route('mail', $message->user->email)
            ->notify(new NewMessage(
                $message->user->name,
                Auth::user()->name,
                $message->advert_title
            ));
        }
        
        return redirect()->route('messages.list');
    }

    public function show(Message $message)
    {
        return view('messages.show')->with(compact(['message']));
    }
}

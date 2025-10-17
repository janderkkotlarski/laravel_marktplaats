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

        /*
        if ($messages->count() > 10) {
            $messages = $messages->paginate(10);
        } else {
            $messages = $messages->get();
        }
        */

        $messages = $messages->count() > 10 ? $messages->paginate(10) : $messages->get();

        // $senders = User::query();

        $sender_data = [];

        $senders = User::orderBy('created_at', 'desc')->get();

        foreach ($messages as $message) {
            // $dupe = 0;

            /*
            foreach ($sender_data as $sender_id) {
                if ($sender_id[0] == $message->sender_id) {
                    
                    break;
                }
            }

            if ($dupe == 0) {
                $sender_ids[] =  $message->sender_id;

                $senders->orWhere('id', $message->sender_id);
            }
            */

            $sender_data[] = [$message->sender_id, $senders[$message->sender_id]->name];


        }

        // $senders = $senders->get();

        return view('messages.overview')->with(compact(['messages', 'sender_data',]));
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

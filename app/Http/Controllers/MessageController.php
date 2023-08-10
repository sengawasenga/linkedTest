<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $sender = auth()->user();
        $recipient = User::findOrFail($request->recipient_id);

        $message = new Message();
        $message->sender()->associate($sender);
        $message->recipient()->associate($recipient);
        $message->content = $request->content;
        $message->save();

        return redirect()->back();
    }
}

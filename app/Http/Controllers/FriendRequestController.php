<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FriendRequest;

class FriendRequestController extends Controller
{
    public function store(Request $request)
    {
        $friendRequest = new FriendRequest;
        $friendRequest->sender_id = auth()->id();
        $friendRequest->recipient_id = $request->recipient_id;
        $friendRequest->save();

        return redirect()->back()->with('success', 'Friend request sent!');
    }

    public function accept(FriendRequest $friendRequest)
    {
        $sender = $friendRequest->sender;
        $recipient = $friendRequest->recipient;

        $sender->friends()->attach($recipient->id);
        $recipient->friends()->attach($sender->id);

        $friendRequest->delete();

        return redirect()->back()->with('success', 'Demande d\'amis acceptée.');
    }

    public function reject(FriendRequest $friendRequest)
    {
        $friendRequest->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $friends = $user->friends;
        $friendRequests = FriendRequest::with('sender')
            ->where('recipient_id', auth()->id())
            ->get();


        return view('home', compact('friends', 'friendRequests'));
    }

    public function users()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('users', compact('users'));
    }
}

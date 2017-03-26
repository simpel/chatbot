<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(User $user)
    {
        return $user->messages;
    }

    public function store(User $user)
    {
    	return $user->addMessage(request('body'), request('type'));
    }

    public function destroy(Message $message)
    {
    	return $message->delete();
    }
}

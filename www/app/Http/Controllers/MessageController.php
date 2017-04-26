<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Thread;
use Illuminate\Http\Request;
use Log;
use Auth;

class MessageController extends Controller
{


    public function index()
    {
        $messages = [];

        if (Auth::check()) {
            $messages = Thread::find(Auth::id())->messages;
        }
        return $messages;
    }

    public function store(Request $request)
    {        
        
        $user_id = 2; //AUTH USER
        $thread_id = User::find($user_id)->thread->id;
        $message = new Message();
        $message->msg = request('message');
        $message->type = request('type');    
        $message->user_id = $user_id;
        $message->thread_id = $thread_id;
        $message->save();
        
    
        return $message;
    }

    public function destroy(Message $message)
    {
    	$message->delete();
    }
}

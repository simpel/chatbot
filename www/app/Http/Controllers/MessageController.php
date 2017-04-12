<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MessageController extends Controller
{
    
    public function index()
    {
        $user = User::find(1);



        return $user->messages;
    }

 

    public function store(Request $request)
    {
    	$user = User::find(1);


    	//save user input
    	
    	$message = new Message;
        $message->type = request('type');
        $message->msg = request('msg');
        $message->sender = request('sender');       
        $message->user_id = '1';
        $message->save();
        return json_encode($message);       
    }

    public function destroy(Message $message)
    {
    	//  if($message->id == auth()->id)

    	$message->delete();
    }
}

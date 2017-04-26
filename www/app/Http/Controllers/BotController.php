<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Thread;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;
use Session;
use stdClass;

class BotController extends Controller
{
    private $wit;
    private $context;
    private $request;
    private $thread_id;

 	public function __construct() {
    	$this->thread_id = User::find('2')->thread->id;
    	Session::push('context', collect());
        $this->wit = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
            ],
            'base_uri' => 'https://api.wit.ai'
        ]);
    }

    private function saveBotMessage($response) {
        $m = new Message();
        $m->msg = $response->msg;
        $m->type = $response->type;    

        if(isset($response->quickreplies)) {
            $m->quickreplies = $response->quickreplies;
        }
        $m->user_id = 1;
        $m->thread_id = $this->thread_id;
        $m->save();
        return $m;
    }


    private function storeUserData($entities) {

    	$key = array_keys((array) $entities)[0];  	
    	Session::put('context.user.'.$key, $entities->$key[0]->value);
   
    	$call = $this->wit->request('POST', 'converse', [
    		'json' => Session::get('context'), 
    		'query' => [
				'v' => '1',
            	'session_id' => 'vk-'.$this->thread_id
    		]
		]);
    	return $this->saveBotMessage(json_decode($call->getBody()));
    }

    private function showForm($entities) {
        $key = array_keys((array) $entities)[0];    
        //Session::put('context.state.'.$key, $entities->$key[0]->value);

        $returnVal = new stdClass();
        $returnVal->type = "form";
        $returnVal->form = $entities->$key[0]->value;
        Log::debug($returnVal);
        return $returnVal;
    }

    private function isLoggedIn($entities) {
        Session::put('context.user.loggedin', false);
        return Session::get('context.user.loggedin');
    }

    

    public function store(Request $request)
    {        
        $user_id = 1;
        $this->thread_id = User::find('2')->thread->id;
        
           
        $witcall = $this->wit->request('POST', 'converse', 
            ['query' => [
                'v' => '1',
                'q' => request('message'),
                'session_id' => 'vk-'.$this->thread_id
                ]
            ]
        );

        $response = json_decode($witcall->getBody());
        $returnVal = response()->json($response);

        switch ($response->type) {
            case 'action':
                $action = $response->action;
                $returnVal = $this->$action($response->entities);
                break;
            default:
            	if($response->type != 'stop') {
		            $returnVal = $this->saveBotMessage($response);
	        	}
        }

        
        return $returnVal;
    }
}

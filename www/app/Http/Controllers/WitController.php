<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Library\ChatResponse;

class WitController extends Controller
{
    private $wit;
	private $wit_base_url = "https://api.wit.ai";
	private $request;

    public function __construct() {
    
        $this->wit = new Client([
	        'headers' => [
	            'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
	        ]
		]);
    }

    private function giveInfo() {
    	
    	$response = new ChatResponse();
    	$response->msg = "GiveInfo";
    	$response->type = "msg";
    	$response->sender = "bot";
    	return $response;

    }

    private function checkPreviousExercises() {
    	
    	$response = new ChatResponse();
    	$response->msg = "checkPreviousExercises";
    	$response->sender = "bot";
    	$response->type = "msg";
    	return $response;

    }

    public function store(Request $request)
    {
    	$user = User::find(1);

    	$witcall = $this->wit->post($this->wit_base_url.'/converse', 
    		['query' => [
    			'v' => '1',
    			'q' => request('msg'),
    			'session_id' => $user->id
    			]
    		]);

    	$response = json_decode($witcall->getBody()->getContents());

    	$resultType = $response->type;
        switch ($resultType) {

            case 'action':
                $action = $response->action;
                $payload = $this->$action();
                break;
            
            default:
                $payload = new ChatResponse($response);
                break;
        }
        
        return json_encode($payload);
        
    }
}

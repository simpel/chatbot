<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Thread;
use App\Message;

use Log;

class ThreadController extends Controller
{
    
	private $wit;
	private $wit_base_url;
    private $result;
    private $resultType;
    private $payload;

	public function __construct() {
    
        $this->wit = new Client([
	        'headers' => [
	            'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
	        ]
		]);
		
		$this->wit_base_url = "https://api.wit.ai";
    }

    private function giveInfo() {
        return 'called GiveInfo';
    }

    public function update(Request $request) {
    	


        $request = $this->wit->post($this->base_url.'/converse', 
    		['query' => [
    			'v' => $request->v,
    			'q' => $request->q,
    			'session_id' => $request->session_id
    			]
    		]);

        $result = $request->getBody()->getContents();
        $resultType = json_decode($result)->type;


        switch ($resultType) {

            case 'action':
                $action = json_decode($result)->action;
                $payload = $this->$action();
                break;
            
            default:
                $payload = $result;
                break;
        }
        
        return $payload;
    }
}
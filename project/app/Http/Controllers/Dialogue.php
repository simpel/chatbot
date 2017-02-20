<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;

class Dialogue extends Controller
{
    
	private $client;
	private $base_url;
    private $result;
    private $resultType;
    private $payload;

	public function __construct()
    {
    
        $this->client = new Client([
	        'headers' => [
	            'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
	        ]
		]);
		
	
		$this->base_url = "https://api.wit.ai";
    }

    private function giveInfo() {
        return 'called GiveInfo';
    }

    public function converse(Request $request) {
    	


        $request = $this->client->post($this->base_url.'/converse', 
    		['query' => [
    			'v' => $request->v,
    			'q' => $request->q,
    			'session_id' => $request->session_id
    			]
    		]);

        $result = $request->getBody()->getContents();
        $resultType = json_decode($result)->type;

        Log::debug($result);

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
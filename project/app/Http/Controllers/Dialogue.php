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

	public function __construct()
    {
    
        $this->client = new Client([
	        'headers' => [
	            'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
	        ]
		]);
		
	
		$this->base_url = "https://api.wit.ai";
    }

    public function converse(Request $request) {
    	$result = $this->client->post($this->base_url.'/converse', 
    		['query' => [
    			'v' => $request->v,
    			'q' => $request->q,
    			'session_id' => $request->session_id
    			]
    		]);
    	return $result;
    }
}
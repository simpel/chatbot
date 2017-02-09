<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;

class Dialogue extends Controller
{
    
	private $client;
	private $session;
	private $v;
	private $base_url;

	public function __construct()
    {
    
        $this->client = new Client([
	        'headers' => [
	            'Authorization' => 'Bearer '.env('WIT_TOKEN', false)
	        ]
		]);
		
		$this->session = time();
		$this->v = '1';
		$this->base_url = "https://api.wit.ai";
    }

    public function converse(Request $request) {
    	$result = $this->client->post($this->base_url.'/converse', 
    		['query' => [
    			'v' => $this->v,
    			'q' => $request->q,
    			'session_id' => $this->session
    			]
    		]);
    	return $result;
    }
}
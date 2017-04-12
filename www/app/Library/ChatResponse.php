<?php 

namespace App\Library;

class ChatResponse {

	public $msg;
	public $action;
	public $sender;
	public $type;
	public $quickreplies;

	public function __construct($response = null) {
		if($response) {
			$this->msg = (isset($response->msg)) ? $response->msg : null;
			$this->action = (isset($response->action)) ? $response->action : null;
			$this->sender = (isset($response->sender)) ? $response->sender : 'bot';
			$this->type = (isset($response->type)) ? $response->type : null;
			$this->quickreplies = (isset($response->quickreplies)) ? $response->quickreplies : null;
		}
	}
}
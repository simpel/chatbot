<?php 

namespace App\Library;



class ChatResponse {

	public $msg;
	public $action;
	public $user_id;
	public $thread_id;
	public $type;
	public $quickreplies;

	public function __construct($response = null) {
		if($response) {
			$this->msg = (isset($response->msg)) ? $response->msg : null;
			$this->action = (isset($response->action)) ? $response->action : null;
			//om ID är med så är det botten, om det inte är med så sätt det till inloggad användare
			$this->user_id = (isset($response->user_id)) ? $response->user_id : '1'; 
			//ändra 1 till AUth.user-id;
			$this->thread_id = \App\User::find(2)->thread->id; 
			$this->type = (isset($response->type)) ? $response->type : null;
			$this->quickreplies = (isset($response->quickreplies)) ? $response->quickreplies : null;
		}
	}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Thread extends Model
{

	protected $fillable = [
        'user_id'
    ];


    public function messages() {
    	return $this->hasMany(Message::class);
    }
}

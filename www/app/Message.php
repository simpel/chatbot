<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   
    protected $fillable = [
        'body', 'type', 'user_id', 'sender'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}

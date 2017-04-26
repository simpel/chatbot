<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   
    protected $fillable = [
        'msg', 'type', 'user_id', 'thread_id', 'quickreplies',
    ];

    protected $casts = [
        'quickreplies' => 'array',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function thread() {
    	return $this->belongsTo(Thread::class);
    }
}

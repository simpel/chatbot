<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $guarded = [];

    public function thread() {
    	return $this->belongsTo(Thread::class);
    }

    public function user() {
    	return $this->belongsTo(User::class)->select(['id', 'name']);
    }
}
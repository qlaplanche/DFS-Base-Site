<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPost extends Model
{
    protected $fillable = [
        'event_id', 'participant_id', 'content',
    ];

    public function event() {
    	return $this->hasOne('App\Event', 'event_id');
    }

    public function participant() {
    	return $this->hasOne('App\Event', 'participant_id');
    }
}

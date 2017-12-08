<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemHistory extends Model
{
    protected $fillable = [
        'situation', 'occured_at', 'event_id', 'participant_id',
    ];

    public function event() {
    	return $this->hasOne('App\Event', 'event_id');
    }

    public function participant() {
    	return $this->hasOne('App\Participant', 'participant_id');
    }
}

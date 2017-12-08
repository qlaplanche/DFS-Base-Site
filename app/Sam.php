<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sam extends Model
{
    protected $fillable = [
        'sam_id', 'participant_id', 'event_id',
    ];

    public function participant() {
    	return $this->hasOne('App\Participant', 'participant_id');
    }

    public function sam() {
    	return $this->hasOne('App\Participant', 'sam_id');
    }

    public function event() {
    	return $this->hasOne('App\Event', 'event_id');
    }
}

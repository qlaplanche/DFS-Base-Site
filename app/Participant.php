<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id',
    ];


    /**
     * Get the sams for the participant.
     */
    public function sams()
    {
        return $this->hasMany('App\Sam', 'sam_id');
    }

    /**
     * Get the problems_history for the participant.
     */
    public function problemHistories()
    {
        return $this->hasMany('App\ProblemHistory', 'participant_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id');
    }

    public function event() {
        return $this->hasOne('App\Event', 'event_id');
    }

    public function delete()
    {
        DB::transaction(function()
        {
            $this->sams()->delete();
            parent::delete();
        });
    }
}

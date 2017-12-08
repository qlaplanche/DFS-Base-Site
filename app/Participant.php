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
        'user', 'event',
    ];


    /**
     * Get the sams for the participant.
     */
    public function sams()
    {
        return $this->hasMany('App\Sam', 'sam');
    }

    /**
     * Get the problems_history for the participant.
     */
    public function problemHistories()
    {
        return $this->hasMany('App\ProblemHistory', 'participant');
    }
}

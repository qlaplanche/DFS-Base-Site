<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'begin_date', 'orga_id', 'visibility',
    ];

    public function posts() {
    	return $this->hasMany('App\EventPost', 'event_id');
    }

    public function problems() {
        return $this->hasMany('App\ProblemHistory', 'event_id');
    }

    public function participants() {
        return $this->hasMany('App\Participant', 'event_id');
    }

    public function delete()
    {
        DB::transaction(function()
        {
            $this->posts()->delete();
            $this->participants()->delete();
            $this->problems()->delete();
            parent::delete();
        });
    }
}

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
        'name', 'begin_date', 'orga', 'visibility',
    ];

    public function posts() {
    	return $this->hasMany('App\EventPost', 'event');
    }
}

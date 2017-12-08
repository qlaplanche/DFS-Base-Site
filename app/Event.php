<?php

namespace App;
q
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

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

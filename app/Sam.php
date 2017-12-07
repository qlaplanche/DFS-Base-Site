<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sam extends Model
{
    protected $fillable = [
        'sam_id', 'participant_id', 'event_id',
    ];
    protected $table = 'sam';
}

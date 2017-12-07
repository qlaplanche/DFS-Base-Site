<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemHistory extends Model
{
    protected $fillable = [
        'situation', 'occured_at', 'event_id', 'participant_id',
    ];
    protected $table = 'problem_history';
}

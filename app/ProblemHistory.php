<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemHistory extends Model
{
    protected $fillable = [
        'situation', 'occured_at', 'event', 'participant',
    ];
    protected $table = 'problem_history';
}

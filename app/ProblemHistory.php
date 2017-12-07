<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemHistory extends Model
{
    protected $fillable = [
        'situation', 'heure',
    ];
    protected $table = 'problem_history';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sam extends Model
{
    protected $fillable = [
        'sam', 'participant', 'event',
    ];
    protected $table = 'sam';
}

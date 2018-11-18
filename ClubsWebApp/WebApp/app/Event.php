<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id', 'event_name', 'description','room', 'address', 'city', 'club_id','event_date'
    ];
}

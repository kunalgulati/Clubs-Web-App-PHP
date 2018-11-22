<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name', 'description','room', 'address', 'city', 'club_id'
    ];

    public function getClubName(){
        $club= Club::find($this->club_id);
        $club_name = $club->name;
        return $club_name;
    }
}

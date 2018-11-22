<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateType;

class Event extends Model
{
    protected $fillable = [
        'event_name', 'description','room', 'address', 'city', 'club_id', 'date'
    ];

    public function getClubName(){
        $club= Club::find($this->club_id)->first();
        $club_name = $club->club_name;
        return $club_name;
    }

    public function getDate(){
        $date_str = $this->date;
        $dateTime = new \DateTime($date_str);
        $date = $dateTime->format('m/d/Y');
        return $date;
    }
    public function getTime(){
        $date_str = $this->date;
        $dateTime = new \DateTime($date_str);
        $time = $dateTime->format('H:i A');
        return $time;
    }
}

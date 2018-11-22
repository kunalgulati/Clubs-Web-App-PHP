<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'club_name', 'information', 'founder_id'
    ];

    public function founder(){
        $founder = User::where('id',$this->founder_id)->first();
        return $founder;
    }
}

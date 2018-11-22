<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Club;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uname', 
        'auth_type', 
        'profile_id',
    ];


    protected $attributes = [
        'profile_id' => null,
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    
    public function getClubs(){
        $clubs = Club::where('founder_id',$this->id)->pluck('club_name','id')->all();
        return $clubs;
    }
}

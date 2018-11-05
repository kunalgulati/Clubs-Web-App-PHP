<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club_user extends Model
{
    protected $fillable = [
        'user_id', 'club_id', 'role',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard_post extends Model
{
    protected $fillable = [
        'title', 'type', 'url'
    ];
}

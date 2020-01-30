<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;
    function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

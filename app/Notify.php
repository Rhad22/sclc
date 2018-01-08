<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = [
        'sender',
        'receiver',
        'content',
        'read',
    ];

    public function user() 
    {
        return $this->belongsToMany('App\User');
    }
}

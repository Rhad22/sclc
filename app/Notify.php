<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{ 
    const UPDATED_AT = null;
    
    protected $fillable = [
        'sender',
        'receiver',
        'content',
        'read',
        'type',
        'link_id',
        'dept_id'
    ];

    public function user() 
    {
        return $this->haveOne('App\User');
    }
}

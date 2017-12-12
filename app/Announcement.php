<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;


    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}

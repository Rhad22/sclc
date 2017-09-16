<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $table = 'communications';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}

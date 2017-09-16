<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'middlename',
        'lastname',
        'gender',
        'address',
        'birthday',
        'status',
        'dept',
        'mobilenumber',
        'user_id',
    ]; 

    public function user() 
    {
        return $this->belongsTo('Ap­p\User');
    }
}

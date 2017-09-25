<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'gender',
        'address',
        'birthday',
        'status',
        'mobilenumber',
        'user_id',
    ]; 

    public function user() 
    {
        return $this->belongsTo('Ap­p\User');
    }
}

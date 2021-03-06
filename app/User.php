<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\reports;


class User extends Authenticatable
{
    use Notifiable;
    use reports;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename','lastname', 'slug', 'position', 'profile_pic', 'email', 'password', 'district', 'isBan',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() 
    {
        return $this->hasOne('App\Profile');
    }

    public function report() 
    {
        return $this->belongsToMany('App\Report');
    }

    public function content() 
    {
        return $this->belongsToMany('App\Content');
    }
    public function announcement() 
    {
        return $this->haveOne('App\Announcement');
    }
    public function position()
    {
        return $this->belongsTo('App\Notify');

    }
    public function dept()
    {
        return $this->belongsTo('App\Profile');

    }
}

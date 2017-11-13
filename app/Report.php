<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $fillable = [
        'user_id',
        'dept_id',
        'dept',
        'row1','row2','row3','row4','row5','row6','row7','row8','row9','row10','row11','row12','row13','row14','row15','row16','row17','row18','row19','row20','row21','row22','row23','row24','row25','row26','row27','row28','row29','row30','row31','row32','row33','row34','row35','row36','row37','row38','row39','row40','row41','row42','row43','row44','row45',
    ]; 

    public function user() 
    {
        return $this->belongsToMany('App\User');
    }
}

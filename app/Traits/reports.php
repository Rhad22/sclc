<?php

namespace App\Traits;
use App\Communication;

trait Reports 
{
    public function qtr4($value) 
    {
        $result = report:: 
            whereBetween('created_at', 
            array(date('Y' . '-9-01'), date('Y' . '-12-31')))
            ->sum($value);

        return $result;
    } 

    public function total() 
    {
    	//1st quarter
        $from = date($year . '-01-01');
        $to = date($year . '-03-31');
    //2nd quater
        $from2 = date($year . '-04-01');
        $to2 = date($year . '-06-30');
    //3rd quater
        $from3 = date($year . '-07-01');
        $to3 = date($year . '-09-30');
    //4th quater
        $from4 = date($year . '-10-01');
        $to4 = date($year . '-12-31');
    //tatol
        $tfrom = date($year . '-01-01');
        $tto = date($year . '-12-31');
    }
}


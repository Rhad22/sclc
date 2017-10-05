<?php

namespace App\Traits;
use App\Communication;

trait Reports 
{
    public function qtr4($value) 
    {
        $result = communication:: 
            whereBetween('created_at', 
            array(date('Y' . '-9-01'), date('Y' . '-12-31')))
            ->sum($value);

        return $result;
    } 
}


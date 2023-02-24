<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{
    function add(String $addParameters):int
    {
        if(empty($addParameters))
            return 0;
        else {
            $addParameters = str_replace("\n",",",$addParameters);
            $numbers_array = explode(",", $addParameters);
            $addResult = 0;
            for ($i = 0; $i < sizeof($numbers_array); $i++){
                $addResult += $numbers_array[$i];
            }
            return $addResult;
        }
    }
}
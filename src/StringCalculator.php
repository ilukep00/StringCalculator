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
            $numbersArray = preg_split('/[,|\n]/',$addParameters);
            $addResult = 0;
            for ($i = 0; $i < sizeof($numbersArray); $i++){
                $addResult += $numbersArray[$i];
            }
            return $addResult;
        }
    }
}
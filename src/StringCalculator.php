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
            if($addParameters[0] =="/" and $addParameters[1] =="/"){
                list($delimiter, $numbers) = explode("\n",$addParameters,2);
                $delimiter = substr($delimiter,2);
                $numbersArray = explode($delimiter, $numbers);
            }
            else{
                $numbersArray = preg_split('/[,|\n]/',$addParameters);
            }
            $addResult = 0;
            for ($i = 0; $i < sizeof($numbersArray); $i++){
                $addResult += $numbersArray[$i];
            }
            return $addResult;
        }
    }
}
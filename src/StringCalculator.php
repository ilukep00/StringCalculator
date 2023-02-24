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
            $delimiters = '/[,|\n]/';
            if(str_starts_with($addParameters,"//")){
                list($delimiter, $addParameters) = explode("\n",$addParameters,2);
                $delimiters = '/'.substr($delimiter,2).'/';
            }
            $numbersArray = preg_split($delimiters,$addParameters);
            $addResult = 0;
            for ($i = 0; $i < sizeof($numbersArray); $i++){
                $addResult += $numbersArray[$i];
            }
            return $addResult;
        }
    }
}
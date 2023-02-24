<?php

namespace Deg540\PHPTestingBoilerplate;

use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use PHPUnit\Exception;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    function add(String $addParameters):int
    {
        if(empty($addParameters))
            return 0;
        else {
            $delimiters = '/,|\n/';
            if(str_starts_with($addParameters,"//")){
                list($delimiter, $addParameters) = explode("\n",$addParameters,2);
                $delimiters = '/'.substr($delimiter,2).'/';
            }
            $numbersArray = preg_split($delimiters,$addParameters);
            $addResult = 0;
            $negativeNumbers = "";
            for ($i = 0; $i < sizeof($numbersArray); $i++){
                $addResult += $numbersArray[$i];
                if($numbersArray[$i] < 0)
                    $negativeNumbers .= $numbersArray[$i];
            }
            if(strlen($negativeNumbers) > 0)
                throw new \Exception('Numeros Negativos: '.$negativeNumbers);
            return $addResult;
        }
    }
}
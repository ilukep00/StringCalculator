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
        if (empty($addParameters))
            return 0;
        else {
            list($delimiters,$addParameters) = $this->returnDelimiters($addParameters);
            $numbersArray = preg_split($delimiters, $addParameters);
            $addResult = 0;
            $negativeNumbers = "";
            for ($i = 0; $i < sizeof($numbersArray); $i++) {
                if (!empty($numbersArray[$i]) and $numbersArray[$i] <= 1000) {
                    $addResult += $numbersArray[$i];
                    if ($numbersArray[$i] < 0)
                        $negativeNumbers .= $numbersArray[$i];
                }
            }
            if (strlen($negativeNumbers) > 0)
                throw new \Exception('Numeros Negativos: ' . $negativeNumbers);
            return $addResult;
        }
    }

    private function returnDelimiters(String $addParameters)
    {
        $delimiters = '/,|\n/';
        if(str_starts_with($addParameters,"//")) {
            list($delimiter, $addParameters) = explode("\n", $addParameters, 2);
            $delimiter = explode("][", substr($delimiter, 2, strlen($delimiter) - 2));
            if (sizeof($delimiter) == 1) {
                if ($delimiter[0] == "[]")
                    return ["/[\D]*/", $addParameters];
                else
                    return ['/' . substr($delimiter[0],1,strlen($delimiter[0])-2) . '/', $addParameters];
            } else {
                if ($delimiter[0] == "[")
                    return ["/[\D]*/", $addParameters];
                else
                    $delimiters = substr($delimiter[0], 1, strlen($delimiter[0]) - 1);
                for ($i = 1; $i < sizeof($delimiter)-1; $i++) {
                    if ($delimiter[$i] == "")
                       return ["/[\D]*/",$addParameters];
                    else {
                        $delimiters .= "|". $delimiter[$i];
                    }
                }
                if ($delimiter[ sizeof($delimiter)-1] == "]")
                    return ["/[\D]*/", $addParameters];
                else
                    $delimiters .= "|".substr($delimiter[sizeof($delimiter)-1], 0, strlen($delimiter[sizeof($delimiter)-1]) - 1);
                $delimiters = '/' . $delimiters . '/';
                return [$delimiters,$addParameters];
            }
        }else{
            return [$delimiters,$addParameters];
        }

    }
}
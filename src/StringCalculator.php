<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{
    function add(String $numbers):int
    {
        if(empty($numbers))
            return 0;
        else {
            $numbers_string = explode(",", $numbers);
            if (sizeof($numbers_string) == 2)
                return strval($numbers_string[0]) + strval($numbers_string[1]);
            return strval($numbers_string[0]);
        }
    }
}
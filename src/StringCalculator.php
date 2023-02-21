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
            $numbers_array = explode(",", $numbers);
            return strval($numbers_array[0]);
        }
      
    }
}
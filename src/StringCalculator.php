<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{
    function Add(String $numbers):int
    {
        if(empty($numbers)){
            return 0;
        }
        return -1;
    }
}
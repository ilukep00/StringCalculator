<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;
    protected function setUp():void
    {
        parent::setUp();
        $this-> stringCalculator = new StringCalculator();

    }

    /**
     * @test
     */
    public function returns_zero_for_empty_string()
    {
        $addedResult = $this -> stringCalculator->add("");

        $this->assertEquals(0,$addedResult);

    }
    /**
     * @test
     */
    public function returns_number_for_string_with_one_number()
    {
        $addedResult = $this -> stringCalculator->add("1");

        $this->assertEquals(1,$addedResult);
    }

    /**
     * @test
     */
    public function returns_sum_for_string_with_two_numbers()
    {
        $addedResult = $this -> stringCalculator->add("1,2");

        $this->assertEquals(3,$addedResult);
    }
    
    

}

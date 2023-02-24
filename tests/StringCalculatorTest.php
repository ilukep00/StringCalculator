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
    public function returns_number_for_string_with_only_this_number()
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
    /**
     * @test
     */
    public function returns_sum_for_string_with_any_amount_of_numbers()
    {
        $addedResult = $this -> stringCalculator->add("1,2,3,5,8");

        $this->assertEquals(19,$addedResult);
    }
    /**
     * @test
     */
    public function returns_sum_using_line_up_as_delimitator()
    {
        $addedResult = $this -> stringCalculator->add("1\n2,3");

        $this->assertEquals(6,$addedResult);
    }
    /**
     * @test
     */
    public function return_sum_using_different_delimiters(){
        $addedResult = $this -> stringCalculator->add("//;\n1;2");

        $this->assertEquals(3,$addedResult);
    }
    /**
     * @test
     */
    public function return_exception_of_using_negative_numbers(){
        $this->expectExceptionMessage('Numeros Negativos: -2');

        $this -> stringCalculator->add("1,-2,3,5,8");
    }

    /**
     * @test
     */
    public function return_ignore_numbers_upper_than_1000(){
        $addedResult = $this -> stringCalculator->add("2,10003");

        $this->assertEquals(2,$addedResult);
    }

}

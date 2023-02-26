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
    public function returnsZeroForEmptyString()
    {
        $addedResult = $this -> stringCalculator->add("");

        $this->assertEquals(0,$addedResult);

    }
    /**
     * @test
     */
    public function returnsNumberForStringWithOnlyThisNumber()
    {
        $addedResult = $this -> stringCalculator->add("1");

        $this->assertEquals(1,$addedResult);
    }

    /**
     * @test
     */
    public function returnsSumForStringWithTwoNumbers()
    {
        $addedResult = $this -> stringCalculator->add("1,2");

        $this->assertEquals(3,$addedResult);
    }
    /**
     * @test
     */
    public function returnsSumForStringWithAnyAmountOfNumbers()
    {
        $addedResult = $this -> stringCalculator->add("1,2,3,5,8");

        $this->assertEquals(19,$addedResult);
    }
    /**
     * @test
     */
    public function returnsSumUsingLineUpAsDelimitator()
    {
        $addedResult = $this -> stringCalculator->add("1\n2,3");

        $this->assertEquals(6,$addedResult);
    }
    /**
     * @test
     */
    public function returnSumUsingDifferentDelimiters(){
        $addedResult = $this -> stringCalculator->add("//;\n1;2");

        $this->assertEquals(3,$addedResult);
    }
    /**
     * @test
     */
    public function returnExceptionOfUsingNegativeNumbers(){
        $this->expectExceptionMessage('Numeros Negativos: -2');

        $this -> stringCalculator->add("1,-2,3,5,8");
    }

    /**
     * @test
     */
    public function returnIgnoreNumbersUpperThan1000(){
        $addedResult = $this -> stringCalculator->add("2,10003");

        $this->assertEquals(2,$addedResult);
    }

    /**
     * @test
     */
    public function returnSumWithDelimitersWithAnyLenght(){
        $addedResult = $this -> stringCalculator->add("//[sdsdddsds]\n1sdsdddsds2sdsdddsds3");

        $this->assertEquals(6,$addedResult);
    }

    /**
     * @test
     */
    public function returnSumWithMultipleDelimiters(){
        $addedResult = $this -> stringCalculator->add("//[--][%][l]\n1--2%3l9");

        $this->assertEquals(15,$addedResult);
    }
}

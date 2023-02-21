<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function returns_zero_for_empty_string()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->Add("");

        $this->assertEquals(0,$result);

    }

}

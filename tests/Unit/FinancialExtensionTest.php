<?php

namespace Xefi\Faker\ItCh\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertMatchesRegularExpression('/^CH\d{19}$/', $iban);
            $this->assertTrue(Iban::isValid($iban));
        }
    }
}

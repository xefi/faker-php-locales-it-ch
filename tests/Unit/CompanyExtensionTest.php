<?php

namespace Xefi\Faker\ItCh\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\ItCh\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing($this->companies, $results);
    }

    public function testCompanyNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->companyNumber();

            $this->assertMatchesRegularExpression('/^CHE-\d{3}\.\d{3}\.\d{3}$/', $result);
            $this->assertTrue($this->isValidUid($result), "The UID '{$result}' should have a valid check digit.");
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->vat();

            $this->assertMatchesRegularExpression('/^CHE-\d{3}\.\d{3}\.\d{3} IVA$/', $result);
            $this->assertTrue($this->isValidUid(substr($result, 0, 15)));
        }
    }

    private function isValidUid(string $uid): bool
    {
        $digits = preg_replace('/\D/', '', $uid);
        $weights = [5, 4, 3, 2, 7, 6, 5, 4];

        $sum = 0;
        for ($i = 0; $i < 8; $i++) {
            $sum += (int) $digits[$i] * $weights[$i];
        }

        $checkDigit = 11 - $sum % 11;

        return $checkDigit !== 10 && $checkDigit % 11 === (int) $digits[8];
    }
}

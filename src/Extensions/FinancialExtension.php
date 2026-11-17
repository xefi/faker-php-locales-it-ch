<?php

namespace Xefi\Faker\ItCh\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): string|null
    {
        return 'it_CH';
    }

    /**
     * Return a Swiss IBAN: a 5-digit bank clearing number followed by a 12-digit account number.
     *
     * @param ?string $countryCode
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'CH';
        }

        if ($format === null) {
            $format = str_repeat('{d}', 5).str_repeat('{d}', 12);
        }

        return parent::iban($countryCode, $format);
    }
}

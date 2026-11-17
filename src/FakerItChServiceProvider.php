<?php

namespace Xefi\Faker\ItCh;

use Xefi\Faker\ItCh\Extensions\AddressExtension;
use Xefi\Faker\ItCh\Extensions\ColorsExtension;
use Xefi\Faker\ItCh\Extensions\CompanyExtension;
use Xefi\Faker\ItCh\Extensions\FinancialExtension;
use Xefi\Faker\ItCh\Extensions\PersonExtension;
use Xefi\Faker\ItCh\Extensions\PhoneExtension;
use Xefi\Faker\ItCh\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerItChServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}

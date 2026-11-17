<?php

namespace Xefi\Faker\ItCh\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+41';

    public function getLocale(): ?string
    {
        return 'it_CH';
    }

    protected array $landlineFormats = [
        '91{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '81{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '75{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '76{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '77{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '78{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '79{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];
}

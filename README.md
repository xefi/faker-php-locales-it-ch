# Faker PHP — it_CH locale

Swiss Italian (`it_CH`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-it-ch
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('it_CH');
```

Generators without a `it_CH` variant fall back to the default locale.

## Locale-specific generators

| Method | Extension | Example |
| --- | --- | --- |
| `province()` / `provinceCode()` | Address | `Ticino` / `TI` |
| `avs(bool $formatted = false)` | Person | `756.1234.5678.97` (EAN-13 check digit) |
| `companyNumber()` | Company | `CHE-123.456.788` (UID, modulo 11 check digit) |
| `vat()` | Company | `CHE-123.456.788 IVA` |
| `iban()` | Financial | `CH9300762011623852957` |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerItChServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT

<?php

namespace Xefi\Faker\ItCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'it_CH';
    }

    private array $companies = [
        'Ceresio Costruzioni SA', 'Verbano Logistica Sagl', 'Ticino Fiduciaria SA',
        'Gottardo Ingegneria Sagl', 'Lugano Digitale SA', 'Bernasconi & Figli SA',
        'Pedrazzini Impianti Sagl', 'Mendrisiotto Meccanica SA', 'Locarno Turismo Sagl',
        'Leventina Legnami SA', 'Valle Maggia Energia SA', 'Monte Generoso Servizi Sagl',
        'Bellinzona Informatica SA', 'Riviera Trasporti Sagl', 'Malcantone Vini SA',
        'Brissago Nautica Sagl', 'Fontana Architetti SA', 'Lepori Elettricità Sagl',
        'Mesolcina Graniti SA', 'Poschiavo Alimentari Sagl', 'Castelgrande Assicurazioni SA',
        'Rezzonico Consulenze Sagl', 'Blenio Formaggi SA', 'Cassarate Design Sagl',
        'Vedeggio Farmaceutica SA', 'Ponte Tresa Commercio Sagl', 'Gambarogno Immobiliare SA',
        'Ticinese Orologi SA', 'Biasca Acciai Sagl', 'Cattaneo & Partner SA',
    ];

    private array $uidWeights = [5, 4, 3, 2, 7, 6, 5, 4];

    /**
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Return a Swiss enterprise identification number (UID) with a valid check digit, such as "CHE-123.456.789".
     *
     * @return string
     */
    public function companyNumber(): string
    {
        do {
            $digits = $this->randomizer->getBytesFromString('0123456789', 8);
            $checkDigit = $this->uidCheckDigit($digits);
        } while ($checkDigit === 10);

        $uid = $digits.$checkDigit;

        return sprintf('CHE-%s.%s.%s', substr($uid, 0, 3), substr($uid, 3, 3), substr($uid, 6, 3));
    }

    /**
     * Return a Swiss VAT number, such as "CHE-123.456.789 IVA".
     *
     * @return string
     */
    public function vat(): string
    {
        return $this->companyNumber().' IVA';
    }

    /**
     * Compute the modulo 11 check digit of the eight UID digits; 10 means the number cannot be issued.
     *
     * @param string $digits
     *
     * @return int
     */
    protected function uidCheckDigit(string $digits): int
    {
        $sum = 0;

        foreach (str_split($digits) as $index => $digit) {
            $sum += (int) $digit * $this->uidWeights[$index];
        }

        return (11 - $sum % 11) % 11;
    }
}

<?php

namespace Xefi\Faker\ItCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'it_CH';
    }

    protected $provinces = [
        'Zurigo' => 'ZH', 'Berna' => 'BE', 'Lucerna' => 'LU', 'Uri' => 'UR', 'Svitto' => 'SZ', 'Obvaldo' => 'OW',
        'Nidvaldo' => 'NW', 'Glarona' => 'GL', 'Zugo' => 'ZG', 'Friburgo' => 'FR', 'Soletta' => 'SO',
        'Basilea Città' => 'BS', 'Basilea Campagna' => 'BL', 'Sciaffusa' => 'SH', 'Appenzello Esterno' => 'AR',
        'Appenzello Interno' => 'AI', 'San Gallo' => 'SG', 'Grigioni' => 'GR', 'Argovia' => 'AG',
        'Turgovia' => 'TG', 'Ticino' => 'TI', 'Vaud' => 'VD', 'Vallese' => 'VS', 'Neuchâtel' => 'NE',
        'Ginevra' => 'GE', 'Giura' => 'JU',
    ];

    protected $regions = [
        'Svizzera italiana', 'Svizzera tedesca', 'Svizzera romanda', 'Svizzera romancia',
    ];

    protected $cities = [
        'Lugano', 'Bellinzona', 'Locarno', 'Mendrisio', 'Chiasso', 'Biasca', 'Ascona', 'Minusio', 'Massagno',
        'Paradiso', 'Agno', 'Losone', 'Muralto', 'Giubiasco', 'Stabio', 'Caslano', 'Airolo', 'Faido', 'Brissago',
        'Balerna', 'Capriasca', 'Gambarogno', 'Riva San Vitale', 'Tenero', 'Roveredo', 'Grono', 'Mesocco',
        'Poschiavo', 'Brusio', 'Bregaglia',
    ];

    protected $streetTypes = ['Via', 'Viale', 'Piazza', 'Vicolo', 'Strada', 'Contrada', 'Riva', 'Salita', 'Largo'];

    protected $streetNames = [
        'Nassa', 'Pretorio', 'Canova', 'Cattori', 'Giuseppe Motta', 'San Gottardo', 'Antonio Ciseri',
        'Stefano Franscini', 'Vincenzo Vela', 'Luigi Lavizzari', 'Cantonale', 'della Stazione', 'Ospedale',
        'Monte Ceneri', 'Lucino', 'Trevano', 'Besso', 'Cassarate', 'Simen', 'Henri Guisan', 'dei Pescatori',
        'del Sole', 'delle Scuole', 'alla Chiesa', 'Vignola', 'Collina d\'Oro', 'Generoso', 'Brè', 'Industria',
        'Dufour',
    ];

    /**
     * Return a random linguistic region of Switzerland.
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Return a random canton name.
     *
     * @return string
     */
    public function province(): string
    {
        return $this->pickArrayRandomKey($this->provinces);
    }

    /**
     * Return a random two-letter canton code.
     *
     * @return string
     */
    public function provinceCode(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    /**
     * Return a random city of Ticino or Italian-speaking Grisons.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Return a random postcode of Italian-speaking Switzerland.
     *
     * @return int
     */
    public function postcode(): int
    {
        return $this->randomizer->getInt(6500, 6999);
    }

    /**
     * Return a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    /**
     * Return a random street name, such as "Via Nassa".
     *
     * @return string
     */
    public function streetName(): string
    {
        return sprintf('%s %s', $this->pickArrayRandomElement($this->streetTypes), $this->pickArrayRandomElement($this->streetNames));
    }

    /**
     * Return a random street name followed by a house number.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Return a full postal address, such as "Via Nassa 12, 6900 Lugano".
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %d %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}

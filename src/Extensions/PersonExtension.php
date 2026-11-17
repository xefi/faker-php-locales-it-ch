<?php

namespace Xefi\Faker\ItCh\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): ?string
    {
        return 'it_CH';
    }

    protected $firstNameMale = [
        'Marco', 'Luca', 'Matteo', 'Alessandro', 'Andrea', 'Davide', 'Simone', 'Fabio', 'Giorgio', 'Mattia',
        'Nicola', 'Paolo', 'Stefano', 'Giovanni', 'Riccardo', 'Filippo', 'Gabriele', 'Samuele', 'Michele', 'Lorenzo',
        'Elia', 'Leonardo', 'Tommaso', 'Federico', 'Sergio', 'Claudio', 'Mauro', 'Franco', 'Renato', 'Diego',
        'Ivo', 'Fulvio', 'Gianni', 'Roberto', 'Daniele', 'Massimo', 'Enea', 'Nicolò', 'Dario', 'Raffaele',
    ];

    protected $firstNameFemale = [
        'Giulia', 'Sara', 'Chiara', 'Martina', 'Alessia', 'Francesca', 'Laura', 'Elena', 'Valentina', 'Federica',
        'Sofia', 'Aurora', 'Alice', 'Anna', 'Emma', 'Noemi', 'Gaia', 'Giorgia', 'Ilaria', 'Michela',
        'Silvia', 'Monica', 'Paola', 'Daniela', 'Manuela', 'Claudia', 'Simona', 'Lara', 'Nadia', 'Tiziana',
        'Carla', 'Lucia', 'Marta', 'Elisa', 'Camilla', 'Irene', 'Beatrice', 'Ginevra', 'Matilde', 'Viola',
    ];

    protected $lastName = [
        'Bernasconi', 'Rossi', 'Ferrari', 'Pedrazzini', 'Lepori', 'Bianchi', 'Galli', 'Fontana', 'Lombardi', 'Rezzonico',
        'Beffa', 'Bassi', 'Gianella', 'Pellandini', 'Cattaneo', 'Pedrini', 'Antognini', 'Delcò', 'Bernardoni', 'Guscetti',
        'Poretti', 'Quadri', 'Rusconi', 'Sassi', 'Soldati', 'Storni', 'Tamò', 'Vassalli', 'Zanetti', 'Bianchetti',
        'Cavadini', 'Fumagalli', 'Gianini', 'Martinoli', 'Molinari', 'Mombelli', 'Pagani', 'Righetti', 'Rossetti', 'Ghisletta',
    ];

    protected $titleMale = ['Sig.', 'Dott.', 'Prof.', 'Avv.', 'Ing.'];

    protected $titleFemale = ['Sig.ra', 'Dott.ssa', 'Prof.ssa', 'Avv.', 'Ing.'];

    /**
     * Return a Swiss social security number (AVS) with a valid EAN-13 check digit.
     *
     * @param bool $formatted Format the number as 756.XXXX.XXXX.XX
     *
     * @return string
     */
    public function avs(bool $formatted = false): string
    {
        $avs = '756'.$this->randomizer->getBytesFromString('0123456789', 9);
        $avs .= $this->ean13CheckDigit($avs);

        if ($formatted) {
            $avs = sprintf('%s.%s.%s.%s', substr($avs, 0, 3), substr($avs, 3, 4), substr($avs, 7, 4), substr($avs, 11, 2));
        }

        return $avs;
    }

    /**
     * Compute the EAN-13 check digit of a twelve-digit number.
     *
     * @param string $number
     *
     * @return int
     */
    protected function ean13CheckDigit(string $number): int
    {
        $sum = 0;

        foreach (str_split($number) as $index => $digit) {
            $sum += (int) $digit * ($index % 2 === 0 ? 1 : 3);
        }

        return (10 - $sum % 10) % 10;
    }
}

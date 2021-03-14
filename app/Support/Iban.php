<?php

namespace App\Support;

class Iban
{
    private static $country_codes = [
        'AX', 'AL', 'AD', 'AT', 'BY', 'BE', 'BA', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FO', 'FI', 'FR', 'DE', 'GI',
        'GR', 'GL', 'HU', 'IS', 'IE', 'IT', 'XK', 'LV', 'LI', 'LT', 'LU', 'MK', 'MT', 'MD', 'MC', 'ME', 'NL', 'NO',
        'PL', 'PT', 'RO', 'SM', 'RS', 'SK', 'SI', 'ES', 'SE', 'CH', 'GB', 'AZ', 'BH', 'BR', 'VG', 'CR', 'DO', 'SV',
        'GF', 'PF', 'TF', 'GE', 'GP', 'GU', 'IR', 'IQ', 'IL', 'JO', 'KZ', 'KW', 'LB', 'MQ', 'MR', 'MU', 'YT', 'NC',
        'PK', 'PS', 'QA', 'RE', 'BL', 'LC', 'MF', 'PM', 'ST', 'SA', 'TL', 'TN', 'TR', 'UA', 'AE', 'WF',
    ];

    public static function validate(string $iban): bool
    {
        $iban = mb_str_split(preg_replace('/\s+/', '', $iban), 4, 'UTF-8');

        if (! in_array(substr($iban[0], 0, 2), self::$country_codes)) {
            return false;
        }

        $checksum = substr($iban[0], 2, 4);
        $iban[0]  = substr($iban[0], 0, 2) . '00';

        array_push($iban, array_shift($iban));

        $iban = collect(mb_str_split(implode($iban), 1, 'UTF-8'))
            ->reduce(function ($carry, $value) {
                if (ctype_alpha($value)) {
                    return $carry .= ((ord($value) - 64) + 9);
                }

                return $carry .= $value;
            });

        return (abs(bcmod($iban, '97') - 98) == $checksum);
    }
}

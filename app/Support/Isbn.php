<?php

declare(strict_types = 1);

namespace App\Support;

class Isbn {
    /**
     * Check for a valid ISBN-10.
     *
     * @param  int|string  $digits
     * @return  bool
     */
    public static function checkISBN10(int|string $digits): bool {
        if (mb_strlen((string) $digits, 'UTF-8') !== 10) {
            return false;
        }

        $digits = mb_str_split((string) $digits, 1, 'UTF-8');

        $s = 0; $t = 0;

        for ($i = 0; $i < 10; $i++) {
            $t += $digits[$i];
            $s += $t;
        }

        return $s % 10 === 0;
    }

    /**
     * Check for a valid ISBN-13.
     *
     * @param  int|string  $digits
     * @return  bool
     */
    public static function checkISBN13(int|string $digits): bool {
        if (mb_strlen((string) $digits, 'UTF-8') !== 13) {
            return false;
        }

        return true;
    }
}

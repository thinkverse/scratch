<?php

declare(strict_types = 1);

use Illuminate\Support\Str;

if (! function_exists('ucfirst')) {
    /**
     * Make a string's first character uppercase.
     *
     * @param  string  $string
     * @return string
     */
    function ucfirst(string $string): string {
        return Str::ucfirst($string);
    }
}

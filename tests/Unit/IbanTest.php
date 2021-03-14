<?php

use App\Support\Iban;

use function PHPUnit\Framework\assertEquals;

test('Iban::validate', function ($iban, $actual) {
    assertEquals(Iban::validate($iban), $actual);
})->with('ibans');

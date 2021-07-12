<?php

use App\Support\Iban;

it('can validate IBAN numbers', function ($iban, $expected) {
    expect(Iban::validate($iban))->toBe($expected);
})->with('ibans');

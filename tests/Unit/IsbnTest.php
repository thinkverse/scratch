<?php

use App\Support\Isbn;

it('can #checkISBN10 checks for correct digit length', function () {
    expect(Isbn::checkISBN10(1_84356_028_31))->toBeFalse();
});

it('can #checkISBN13 checks for correct digit length', function () {
    expect(Isbn::checkISBN13(978_1_86197_876_91))->toBeFalse();
});

it('can #checkISBN10 can validate correct ISBN-10', function () {
    expect(Isbn::checkISBN10(1_84356_028_3))->toBeTrue();
});

it('can #checkISBN13 can validate correct ISBN-13', function () {
    expect(Isbn::checkISBN13(978_1_86197_876_9))->toBeTrue();
});

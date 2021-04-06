<?php

use App\Support\Isbn;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

test('#checkISBN10 checks for correct digit length', function () {
    assertFalse(Isbn::checkISBN10(1_84356_028_31));
});

test('#checkISBN13 checks for correct digit length', function () {
    assertFalse(Isbn::checkISBN13(978_1_86197_876_91));
});

test('#checkISBN10 can validate correct ISBN-10', function () {
    assertTrue(Isbn::checkISBN10(1_84356_028_3));
});

test('#checkISBN13 can validate correct ISBN-13', function () {
    assertTrue(Isbn::checkISBN13(978_1_86197_876_9));
});

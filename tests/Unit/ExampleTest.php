<?php

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertTrue;

test('mock function exists', function() {
    assertTrue(function_exists('mock'));
});

test('mock function works', function() {
    assertInstanceOf(\Mockery\MockInterface::class, mock(Mockery::class));
});

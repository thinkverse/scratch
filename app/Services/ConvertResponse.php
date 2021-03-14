<?php

namespace App\Services;

use BadMethodCallException;

class ConvertResponse
{
    private const METHODS = [
        1 => 'CSV', 2 => 'JSON',
        3 => 'XML',
    ];

    public function handle(string $query = null)
    {
        if (! array_key_exists($query, self::METHODS)) {
            return;
        }

        if (! method_exists($this, 'to'.self::METHODS[$query])) {
            throw new BadMethodCallException(
                'Method to'.self::METHODS[$query].'() not found in '. self::class
            );
        }

        return $this->{'to'.self::METHODS[$query]}();
    }

    public function toCSV()
    {
        return response(['to CSV!']);
    }

    public function toJSON()
    {
        return response()->json(['to JSON!']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinaryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->toText('01001001 00100000 01100011 01100001 01101110 00100000 01100101 01110110 01100101 01101110 00100000 01100100 01101111 00100000 01100101 01101101 01101111 01101010 01101001 01110011 00100000 11110000 10011111 10010001 10001101');
    }

    private function toText(string $binary)
    {
        return array_reduce(str_split(preg_replace('/\s+/', '', $binary), 8), fn ($carry, $byte) => $carry .= chr(bindec($byte)), '');
    }

    private function toBinary(string $string)
    {
        return trim(array_reduce(str_split($string), fn ($carry, $char) => $carry .= ' ' . str_pad(decbin(ord($char)), 8, 0, STR_PAD_LEFT), ''));
    }
}

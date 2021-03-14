<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Iban;

class IbanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (! $request->has('iban')) {
            return "Need IBAN to check, e.g. {$request->url()}?iban=BA511234567890DEF123";
        }

        return (Iban::validate($request->input('iban')))
            ? 'Valid IBAN' : 'Invalid IBAN';
    }
}

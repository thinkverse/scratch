<?php

namespace App\Http\Controllers;

use App\Services\ConvertResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ConvertResponse $convert)
    {
        return $convert->handle($request->query('source')) ?? response()->json(['Error'], 400);
    }
}

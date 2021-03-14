<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UuidController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $orderedDate = $this->getDateFromUUID(Str::orderedUuid());
        $regularDate = $this->getDateFromUUID(Str::uuid());

        return "Ordered UUID was created {$orderedDate}.\n<br/>UUID was created {$regularDate}.\n";
    }

    function getDateFromUUID($uuid) {
        $formatted_uuid = str_replace('-', '', $uuid);

        $timestamp = substr(hexdec(substr($formatted_uuid, 0, 12)), 0, 10);

        return date('l, d M Y \a\t H:i:sa', $timestamp);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

        return "Ordered UUID was created {$orderedDate->diffForHumans()}.\n<br/>UUID was created {$regularDate->diffForHumans()}.\n";
    }

    /**
     * Return the date from a UUID in a formatted manner.
     *
     * @param  string  $uuid
     * @return Carbon
     */
    function getDateFromUUID(string $uuid): Carbon {
        $formatted_uuid = str_replace('-', '', $uuid);

        $timestamp = substr(hexdec(substr($formatted_uuid, 0, 12)), 0, 10);

        return Carbon::createFromTimestamp($timestamp);
    }
}

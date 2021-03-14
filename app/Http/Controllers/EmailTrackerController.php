<?php

namespace App\Http\Controllers;

use App\Mail\NewLead;
use Illuminate\Http\Request;
use App\Models\Email;

class EmailTrackerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('emails.index', [
            'emails' => Email::when($request->input('orderBy') == 'opened', function ($builder) use ($request) {
                return $builder->orderByRaw('CASE WHEN opened_at IS NULL THEN 1 ELSE 0 END ASC')
                    ->orderBy('opened_at', 'DESC');
            })->when($request->input('orderBy') == 'pending', function ($builder) use ($request) {
                return $builder->orderByRaw('CASE WHEN opened_at IS NULL THEN 0 ELSE 1 END ASC')
                    ->orderBy('opened_at', 'DESC');
            })->when($request->input('orderBy') == 'viewed', function ($builder) use ($request) {
                return $builder->orderBy('viewed', $request->input('orderRule', 'DESC'));
            })->latest()->paginate(25)->withQueryString(),
        ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email         $email
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Email $email)
    {
        abort_unless($email->exists, 404);

        if (! $email->wasOpened()) {
            $email->markAsOpened();
        }

        $email->markAsViewed();

        return response($email->getTrackingImage(), 200, [
            'Content-Type'  => 'image/png',
            'Pragma'        => 'public',
            'Expires'       => '0',
            'Cache-Control' => 'must-revalidate; post-check=0, pre-check=0',
        ]);
    }

    /**
     * Preview Lead mailable.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function mailable()
    {
        return new NewLead(Email::inRandomOrder()->limit(1)->first());
    }
}

<?php

namespace App\Console\Commands;

use App\Mail\NewLead;
use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewLead extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lead:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send lead email for testing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = Email::inRandomOrder()->limit(1)->first();
        Mail::to($email->email)->send(new NewLead($email));

        return 0;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmail extends Command
{
    protected $signature = 'email:send-test {email}';

    protected $description = 'Send a test email to the specified email address';

    public function handle()
    {
        $recipient = $this->argument('email');

        Mail::raw('This is a test email', function ($message) use ($recipient) {
            $message->to($recipient)->subject('Test Email');
        });

        $this->info('Test email sent successfully to ' . $recipient);
    }
}

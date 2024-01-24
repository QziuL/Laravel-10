<?php

namespace App\Listeners;

use App\Events\SupportRepliedEvent;
use App\Mail\SupportRepliedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWhenSupportReplied
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SupportRepliedEvent $event): void
    {
        $reply = $event->getReply();

        Mail::to($reply->user['email'])->send(new SupportRepliedMail($reply));
    }
}

<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Log;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $message = $event->message;

        Log::channel('maillog')->info('Email Sent', [
            'to'      => implode(', ', array_keys($message->getTo() ?? [])),
            'from'    => implode(', ', array_keys($message->getFrom() ?? [])),
            'subject' => $message->getSubject(),
            'body'    => $message->getBody(), // Careful: includes HTML/text content
        ]);
    }
}

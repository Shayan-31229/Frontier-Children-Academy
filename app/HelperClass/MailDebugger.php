<?php

namespace App\HelperClass;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class MailDebugger
{
    public static function enable()
    {
        Event::listen(MessageSending::class, function ($event) {
            $trace = collect(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))
                        ->filter(fn($t) => isset($t['file']))
                        ->take(8) // limit so log doesn't blow up
                        ->map(fn($t) => $t['file'] . ':' . ($t['line'] ?? ''))
                        ->toArray();

            Log::warning('🚨 Outgoing Mail Detected', [
                'to' => $event->message->getTo(),
                'subject' => $event->message->getSubject(),
                'trace' => $trace,
            ]);
        });
    }
}

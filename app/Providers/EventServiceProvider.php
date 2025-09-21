<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Log;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],

        \Illuminate\Mail\Events\MessageSent::class => [
            \App\Listeners\LogSentMessage::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();


        Event::listen(MessageSending::class, function ($event) {
            $trace = collect(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))
                ->filter(fn($t) => isset($t['file']))
                ->take(8) // keep it short
                ->map(fn($t) => $t['file'] . ':' . ($t['line'] ?? ''))
                ->toArray();

            Log::warning('🚨 Outgoing Mail Detected', [
                'to' => $event->message->getTo(),
                'subject' => $event->message->getSubject(),
                // 'body' => $event->message->getBody(),
                'trace' => $trace,
            ]);
        });
    }
}

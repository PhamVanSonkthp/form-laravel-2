<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Spatie\ResponseCache\Facades\ResponseCache;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();

        Event::listen(['eloquent.saved: *', 'eloquent.created: *', 'eloquent.updated: *', 'eloquent.deleted: *'], function($context) {
            // dump($context); ---> $context hold information about concerned model and fired event : e.g "eloquent.created: App\User"
            // YOUR CODE GOES HERE
            ResponseCache::clear();
        });

    }
}

<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\ParticipantChat;
use App\Observers\OrderObserver;
use App\Observers\ParticipantChatObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        ParticipantChat::observe(ParticipantChatObserver::class);
        Order::observe(OrderObserver::class);
    }
}

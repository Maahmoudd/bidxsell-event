<?php

namespace App\Providers;

use App\Services\EventsService;
use App\Services\IEventsService;
use App\Services\IPurchaseEventTicketService;
use App\Services\PurchaseEventTicketService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IPurchaseEventTicketService::class, PurchaseEventTicketService::class);
        $this->app->bind(IEventsService::class, EventsService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}

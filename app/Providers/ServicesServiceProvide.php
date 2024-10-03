<?php

namespace App\Providers;

use App\Services\EventsService;
use App\Services\GeneralPurchaseService;
use App\Services\GroupPurchaseService;
use App\Services\IEventsService;
use App\Services\IPurchaseEventTicketService;
use App\Services\VipPurchaseService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // here i decided to use a strategy design pattern to determine which service to use
        // based on the ticket type we get from the request
        $this->app->bind(IPurchaseEventTicketService::class, function () {
            $ticketType = request()->input('ticket_type');

            // Using a match expression to determine the correct service
            $serviceClass = match ($ticketType) {
                'general' => GeneralPurchaseService::class,
                'vip' => VipPurchaseService::class,
                'group' => GroupPurchaseService::class,
                default => throw new \InvalidArgumentException("Invalid ticket type: {$ticketType}"),
            };

            return app($serviceClass);
        });

        $this->app->bind(IEventsService::class, EventsService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}

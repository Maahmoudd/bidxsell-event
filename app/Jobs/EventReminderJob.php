<?php

namespace App\Jobs;

use App\Mail\EventReminderMail;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EventReminderJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }


    public function handle(): void
    {
        Log::info('Sending event reminder emails');
        // Process events in chunks to prevent memory overload
        Event::with('tickets')
            ->whereBetween('date', [Carbon::now(), Carbon::now()->addHours(6)])
            ->chunk(100, function ($events) {
                $events->each(function ($event) {
                    // Send email reminders for each ticket in the event
                    $this->processEventTickets($event);
                });
            });
    }

    /**
     * Process tickets for a given event and send reminder emails
     *
     * @param \App\Models\Event $event
     * @return void
     */
    protected function processEventTickets(Event $event): void
    {
        // Use collect to iterate over the tickets and send emails
        collect($event->tickets)->each(function ($ticket) use ($event) {
            $customerName = $ticket->customer_name ?? $ticket->group_name;
            $customerEmail = $ticket->customer_email;

            if ($customerEmail) {
                try {
                    Mail::to($customerEmail)->queue(new EventReminderMail($event, $customerName));
                    Log::info("Event reminder sent to {$customerEmail} for event ID {$event->id}");
                } catch (\Exception $e) {
                    Log::error("Failed to send reminder to {$customerEmail} for event ID {$event->id}. Error: {$e->getMessage()}");
                }
            } else {
                Log::warning("No email found for ticket ID {$ticket->id} for event ID {$event->id}");
            }
        });
    }
}

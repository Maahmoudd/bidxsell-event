<?php

namespace App\Services;

use App\Enums\TicketTypesEnum;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class GeneralPurchaseService implements IPurchaseEventTicketService
{

    public function purchase(Request $request): ?TicketResource
    {
        $dataByTicketType = $this->validateTicketData($request);
        $ticketPurchased = $request->user()->tickets()->create($dataByTicketType);
        return $ticketPurchased ? TicketResource::make($ticketPurchased) : null;
    }

    public function validateTicketData(Request $request): array
    {
        return $request->validate([
            'event_id' => ['required', 'integer', 'exists:events,id'],
            'ticket_type' => ['required', new Enum(TicketTypesEnum::class)],
            'number_of_tickets' => ['required', 'integer', 'min:1'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'seat_preference' => ['nullable', 'string', 'max:255'],
        ]);
    }
}

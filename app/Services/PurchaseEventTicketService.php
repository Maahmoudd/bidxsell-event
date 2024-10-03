<?php

namespace App\Services;

use App\Enums\TicketTypesEnum;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class PurchaseEventTicketService implements IPurchaseEventTicketService
{

    public function purchase(array $data): ?TicketResource
    {
        $ticketPurchased = auth()->user()->tickets()->create($data);
        return $ticketPurchased ? TicketResource::make($ticketPurchased) : null;
    }

}

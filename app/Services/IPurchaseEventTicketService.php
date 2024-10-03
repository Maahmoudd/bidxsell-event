<?php

namespace App\Services;

use App\Http\Resources\TicketResource;

interface IPurchaseEventTicketService
{
    public function purchase(array $data): ?TicketResource;

}

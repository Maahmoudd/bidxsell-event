<?php

namespace App\Services;

use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;

interface IPurchaseEventTicketService
{
    public function purchase(Request $request): ?TicketResource;

    public function validateTicketData(Request $request): array;

}

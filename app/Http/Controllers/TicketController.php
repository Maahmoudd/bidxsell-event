<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketPurchaseRequest;
use App\Services\IPurchaseEventTicketService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends ApiBaseController
{
    public function store(TicketPurchaseRequest $request, IPurchaseEventTicketService $purchaseService)
    {
        $ticketPurchased = $purchaseService->purchase($request->validated());
        return $ticketPurchased ? $this->respondSuccess($ticketPurchased, status: Response::HTTP_CREATED) : $this->respondError(errors: 'Unable to purchase ticket', status: Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}

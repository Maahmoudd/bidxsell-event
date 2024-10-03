<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Create the initial array with all ticket attributes
        $ticketArray = [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'number_of_tickets' => $this->number_of_tickets,
            'price' => $this->price,
            'ticket_type' => $this->ticket_type,
            'seat_preference' => $this->seat_preference,
            'backstage_access' => $this->backstage_access,
            'complimentary_drinks' => $this->complimentary_drinks,
            'group_name' => $this->group_name,
            'special_requests' => $this->special_requests,
            'user' => UserResource::make($this->whenLoaded('user')),
            'event' => EventResource::make($this->whenLoaded('event')),
            'created_at' => $this->created_at,
        ];

        // Filter out null values
        return array_filter($ticketArray, fn($value) => !is_null($value) && $value !== 0);
    }
}

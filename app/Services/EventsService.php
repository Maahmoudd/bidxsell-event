<?php

namespace App\Services;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventsService implements IEventsService
{

    public function listAllEvents(): AnonymousResourceCollection
    {
        return EventResource::collection(Event::with('tickets')->get());
    }

    public function createEvent(array $data): ?EventResource
    {
        $existingEvent = $this->getEventByDateAndVenue($data);
        $event = is_null($existingEvent) ? Event::create($data) : null;
        return $event ? EventResource::make($event) : null;
    }

    public function getSingleEvent($id): ?EventResource
    {
        $event = Event::with('tickets')->find($id);
        return $event ? EventResource::make($event->load('tickets')) : null;
    }

    protected function getEventByDateAndVenue(array $data)
    {
        return Event::byDateAndVenue($data['date'], $data['venue_id'])->first();
    }
}

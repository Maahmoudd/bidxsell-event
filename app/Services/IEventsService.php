<?php

namespace App\Services;

use App\Http\Resources\EventResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface IEventsService
{
    public function listAllEvents(): AnonymousResourceCollection;
    public function createEvent(array $data): ?EventResource;
    public function getSingleEvent($id): ?EventResource;
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Services\IEventsService;
use Symfony\Component\HttpFoundation\Response;

class EventController extends ApiBaseController
{

    public function __construct(protected IEventsService $eventsService){}

    public function index()
    {
        $events = $this->eventsService->listAllEvents();
        return $events ? $this->respondSuccess($events) : $this->respondError(errors: 'Unauthorized', message: 'Login Failed', status: Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function store(StoreEventRequest $request)
    {
        $event = $this->eventsService->createEvent($request->validated());
        return $event ? $this->respondSuccess($event) : $this->respondError(errors: 'Not Stored', message: 'Not Stored', status: Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function show($id)
    {
        $event = $this->eventsService->getSingleEvent($id);
        return $event ? $this->respondSuccess($event) : $this->respondError(errors: 'Not Found', message: 'Not Found', status: Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}

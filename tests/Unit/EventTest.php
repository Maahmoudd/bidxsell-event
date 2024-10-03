<?php

namespace Tests\Unit;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Venue;
use App\Services\IEventsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Tests\TestCase;
use function PHPUnit\Framework\assertNotNull;

class EventTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_can_list_all_events()
    {
        Event::factory()->count(3)->create([
            'venue_id' => Venue::factory()->create(),
        ]);

        $events = app(IEventsService::class)->listAllEvents();

        $this->assertInstanceOf(AnonymousResourceCollection::class, $events);
        $this->assertCount(3, $events);
    }

    /** @test */
    public function it_can_get_an_event()
    {
        $event = Event::factory()->create([
            'venue_id' => Venue::factory()->create(),
        ]);
        $myEvent = app(IEventsService::class)->getSingleEvent($event->id);
        assertNotNull($myEvent);
    }


    /** @test */
    public function it_can_create_an_event()
    {
        $event = app(IEventsService::class)->createEvent([
            'name' => 'My Event',
            'price' => 100,
            'date' => '2020-01-01',
            'venue_id' => Venue::factory()->create()->id,
        ]);
        $this->assertInstanceOf(EventResource::class, $event);
    }

}

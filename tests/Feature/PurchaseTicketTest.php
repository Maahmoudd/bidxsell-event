<?php

namespace Tests\Feature;

use App\Enums\TicketTypesEnum;
use App\Models\Event;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PurchaseTicketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_purchase_a_ticket()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create([
            'venue_id' => Venue::factory()->create()->id,
        ]);

        $response = $this->actingAs($user)->postJson('/api/purchase-ticket', [
            'event_id' => $event->id,
            'ticket_type' => TicketTypesEnum::GROUP_BOOKING,
            'number_of_tickets' => 2,
            'group_name' => 'Test Group',
            'special_requests' => 'Need special seating',
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('tickets', [
            'event_id' => $event->id,
            'ticket_type' => TicketTypesEnum::GROUP_BOOKING,
            'number_of_tickets' => 2,
            'group_name' => 'Test Group',
        ]);
    }

}

<?php

namespace Database\Factories;

use App\Enums\TicketTypesEnum;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 10),
            'event_id' => rand(1, 3), // Random event_id between 1 and 3
            'number_of_tickets' => $this->faker->numberBetween(1, 10), // Random ticket number
        ];
    }

    /**
     * General Admission Ticket
     */
    public function generalAdmission(): Factory
    {
        return $this->state(function () {
            return [
                'ticket_type' => TicketTypesEnum::GENERAL_ADMISSION->value,
                'customer_name' => $this->faker->name,
                'customer_email' => $this->faker->safeEmail,
                'seat_preference' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            ];
        });
    }

    /**
     * VIP Admission Ticket
     */
    public function vipAdmission(): Factory
    {
        return $this->state(function () {
            return [
                'ticket_type' => TicketTypesEnum::VIP_ADMISSION->value,
                'customer_name' => $this->faker->name,
                'customer_email' => $this->faker->safeEmail,
                'backstage_access' => true,
                'complimentary_drinks' => true,
            ];
        });
    }

    /**
     * Group Booking Ticket
     */
    public function groupBooking(): Factory
    {
        return $this->state(function () {
            return [
                'ticket_type' => TicketTypesEnum::GROUP_BOOKING->value,
                'group_name' => $this->faker->company,
                'special_requests' => $this->faker->sentence,
            ];
        });
    }
}

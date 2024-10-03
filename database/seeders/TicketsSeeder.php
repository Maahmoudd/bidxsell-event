<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Admission Tickets
        Ticket::factory()->count(5)->generalAdmission()->create();

        // VIP Admission Tickets
        Ticket::factory()->count(5)->vipAdmission()->create();

        // Group Booking Tickets
        Ticket::factory()->count(5)->groupBooking()->create();
    }
}

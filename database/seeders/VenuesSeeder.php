<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venue::factory(5)->create()->each(function ($venue) {
            $venue->events()->createMany(
                Event::factory(rand(3, 5))->make()->toArray()
            );
        });
    }
}

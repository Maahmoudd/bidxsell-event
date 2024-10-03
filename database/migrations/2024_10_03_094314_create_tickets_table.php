<?php

use App\Enums\TicketTypesEnum;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(); // Customer name for all ticket types
            $table->string('customer_email')->nullable(); // Customer email for general and VIP
            $table->integer('number_of_tickets'); // Number of tickets purchased
            $table->enum('ticket_type', array_column(TicketTypesEnum::cases(), 'value'));
            $table->string('seat_preference')->nullable(); // For general admission
            $table->boolean('backstage_access')->default(false); // For VIP tickets
            $table->boolean('complimentary_drinks')->default(false); // For VIP tickets
            $table->string('group_name')->nullable(); // For group bookings
            $table->text('special_requests')->nullable(); // For group bookings

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Event::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

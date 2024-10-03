<?php

namespace App\Models;

use App\Enums\TicketTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function setTicketType(TicketTypesEnum $type): void
    {
        $this->attributes['ticket_type'] = $type->value;
    }

    public function getTicketType(): TicketTypesEnum
    {
        return TicketTypesEnum::from($this->attributes['ticket_type']);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

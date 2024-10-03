<?php

namespace App\Http\Requests;

use App\Enums\TicketTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TicketPurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'integer', 'exists:events,id'],
            'ticket_type' => ['required', new Enum(TicketTypesEnum::class)],
            'number_of_tickets' => ['required', 'integer', 'min:1'],
            'customer_name' => [
                'required_if:ticket_type,' . TicketTypesEnum::GENERAL_ADMISSION->value . ',' . TicketTypesEnum::VIP_ADMISSION->value,
                'string',
                'max:255'
            ],
            'customer_email' => [
                'required_if:ticket_type,' . TicketTypesEnum::GENERAL_ADMISSION->value . ',' . TicketTypesEnum::VIP_ADMISSION->value,
                'email',
                'max:255'
            ],
            'backstage_access' => [
                'required_if:ticket_type,' . TicketTypesEnum::VIP_ADMISSION->value,
                'boolean'
            ],
            'complimentary_drinks' => [
                'required_if:ticket_type,' . TicketTypesEnum::VIP_ADMISSION->value,
                'boolean'
            ],
            'seat_preference' => [
                'required_if:ticket_type,' . TicketTypesEnum::GENERAL_ADMISSION->value,
                'string',
                'max:255'
            ],
            'group_name' => [
                'required_if:ticket_type,' . TicketTypesEnum::GROUP_BOOKING->value,
                'string',
                'max:255'
            ],
            'special_requests' => [
                'required_if:ticket_type,' . TicketTypesEnum::GROUP_BOOKING->value,
                'string'
            ],
        ];
    }

}

<?php

namespace App\Enums;

enum TicketTypesEnum: string
{
    case GENERAL_ADMISSION = 'general';
    case VIP_ADMISSION = 'vip';
    case GROUP_BOOKING = 'group';
}

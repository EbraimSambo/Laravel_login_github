<?php

namespace App\Enums;

enum TicketStutus: string {
    case OPEN = "open";
    case RESOLVED = 'resolved';
    case REJECTED = 'rejected';
}

<?php

namespace App\Enums;

enum Role: string
{
    case VISITOR = 'visitor';
    case FERRY_ADMIN = 'ferry_admin';
    case HOTEL_ADMIN = 'hotel_admin';
    case PARK_ADMIN = 'park_admin';
    case SUPER_ADMIN = 'super_admin';
}

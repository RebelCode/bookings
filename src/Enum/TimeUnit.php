<?php

namespace RebelCode\Bookings\Enum;

use MyCLabs\Enum\Enum;

/**
 * Time unit enumeration values representing their respective multiplier in terms of seconds.
 *
 * @since [*next-version*]
 */
class TimeUnit extends Enum
{
    const SECONDS = 1;
    const MINUTES = 60;
    const HOURS   = 3600;
    const DAYS    = 86400;
    const WEEKS   = 604800;
}

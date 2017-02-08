<?php

namespace RebelCode\Bookings\Enum;

use \MyCLabs\Enum\Enum;

/**
 * Booking status enumeration.
 *
 * @since [*next-version*]
 */
class BookingStatus extends Enum
{
    const CONFIRMED = 'confirmed';
    const PENDING   = 'pending';
    const COMPLETED = 'completed';
    const IN_CART   = 'in_cart';
    const CANCELLED = 'cancelled';
    const REJECTED  = 'rejected';
    const NO_SHOW   = 'no_show';
    const PAID      = 'paid';
    const UNPAID    = 'unpaid';
    const DRAFT     = 'draft';
}

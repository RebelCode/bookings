<?php

namespace RebelCode\Bookings\Validation;

use \RebelCode\Diary\BookingInterface;

/**
 * Something that can check if a booking can be booked.
 *
 * @since [*next-version*]
 */
interface BookingValidatorInterface
{
    /**
     * Checks if a booking can be booked.
     *
     * @param BookingInterface $booking The booking to check.
     *
     * @return bool True if the booking can be booked, false if not.
     */
    public function canBook(BookingInterface $booking);
}

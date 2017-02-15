<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use RebelCode\Diary\BookingInterface;
use RebelCode\Diary\DateTime\DateTime;

/**
 * A range rule that defines a restriction on the time portion of a booking.
 *
 * @since [*next-version*]
 */
class TimeRangeRule extends AbstractRangeRule
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function bookingObeysRule(BookingInterface $booking)
    {
        // Create DateTime objects
        $bookingStartDateTime = DateTime::createFromTimestamp($booking->getPeriod()->getStart()->getTimestamp());
        $bookingEndDateTime   = DateTime::createFromTimestamp($booking->getPeriod()->getEnd()->getTimestamp());
        // Get the time portions only
        $bookingStart = $bookingStartDateTime->secondsSinceMidnight();
        $bookingEnd   = $bookingEndDateTime->secondsSinceMidnight();

        // Get range values
        $rangeStart = $this->getStart();
        $rangeEnd   = $this->getEnd();

        // Standard range check:
        // Range start value is smaller than range end value.
        // Booking start and end times must be inside the range
        if ($rangeStart <= $rangeEnd) {
            return $this->_isInRange($bookingStart, $rangeStart, $rangeEnd)
                && $this->_isInRange($bookingEnd, $rangeStart, $rangeEnd);
        }

        // Inversed range check:
        // Range start value is larger than range end value
        // Booking start and end times must not be inside the inversed range
       return !$this->_isInRange($bookingStart, $rangeEnd, $rangeStart, false, false)
            && !$this->_isInRange($bookingEnd, $rangeEnd, $rangeStart, false, false);
    }
}

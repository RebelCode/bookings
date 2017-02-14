<?php

namespace RebelCode\Bookings\Model\Availability;

use Dhii\Expression\LogicalExpressionInterface;
use RebelCode\Bookings\Expression\BookingContext;
use RebelCode\Diary\BookingInterface;

/**
 * Basic functionality for an expression that uses a logical expression to assert whether a
 * booking can be booked or not.
 *
 * @since [*next-version*]
 */
abstract class AbstractExpressionAvailability extends AbstractAvailability
{
    /**
     * Retrieves the logical expression.
     *
     * @since [*next-version*]
     *
     * @return LogicalExpressionInterface The logical expression.
     */
    abstract public function getExpression();

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function canBook(BookingInterface $booking)
    {
        $ctx = new BookingContext($booking);

        return $this->getExpression()->evaluate($ctx);
    }
}

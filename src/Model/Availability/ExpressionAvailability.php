<?php

namespace RebelCode\Bookings\Model\Availability;

use Dhii\Expression\ExpressionInterface;
use RebelCode\Bookings\Expression\BookingContext;
use RebelCode\Diary\BookingInterface;

/**
 * An availability that uses an expression to assert whether a booking can be booked or not.
 *
 * @since [*next-version*]
 *
 * @method ExpressionInterface getExpression() Gets the expression.
 * @method $this setExpression(ExpressionInterface $expression) Sets the expression.
 */
class ExpressionAvailability extends AbstractAvailability
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function canBook(BookingInterface $booking)
    {
        $expression = $this->getExpression();
        $context    = new BookingContext($booking);
        $canBook    = $expression->evaluate($context);

        return $canBook;
    }
}

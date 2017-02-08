<?php

namespace RebelCode\Bookings\Model\Availability;

use \Dhii\Espresso\Expression\AndExpression;
use \RebelCode\Bookings\Model\Availability\ExpressionAvailability;
use \RebelCode\Bookings\Model\Availability\RuleInterface;


/**
 * An availability implementation that uses an expression that consists of rules
 * to define when a booking can be booked.
 *
 * This implementation allows a booking to be booked if it obeys _all_ the rules.
 *
 * @since [*next-version*]
 *
 * @method RuleInterface[] getRules() Gets the availability rules.
 * @method $this setRules(array $rules) Sets the availability rules.
 */
class RuleExpressionAvailability extends ExpressionAvailability
{
    /**
     * Gets the expression.
     *
     * @since [*next-version*]
     *
     * @return AndExpression The expression instance.
     */
    public function getExpression()
    {
        return new AndExpression($this->getRules());
    }
}

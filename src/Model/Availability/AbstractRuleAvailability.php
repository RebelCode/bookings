<?php

namespace RebelCode\Bookings\Model\Availability;

use \RebelCode\Bookings\Model\Availability\Rule\RuleInterface;

/**
 * An availability implementation that uses an expression that consists of rules
 * to define when a booking can be booked.
 *
 * @since [*next-version*]
 *
 * @method RuleInterface[] getRules() Gets the availability rules.
 * @method $this setRules(array $rules) Sets the availability rules.
 */
abstract class AbstractRuleAvailability extends AbstractExpressionAvailability
{
}

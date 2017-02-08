<?php

namespace RebelCode\Bookings\Model\Availability;

use \Dhii\Expression\ExpressionInterface;
use \RebelCode\Bookings\Validation\BookingValidatorInterface;

/**
 * Something that defines a rule that restricts availability.
 *
 * @since [*next-version*]
 */
interface RuleInterface extends BookingValidatorInterface, ExpressionInterface
{
}

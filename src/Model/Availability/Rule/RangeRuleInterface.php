<?php

namespace RebelCode\Bookings\Model\Availability;

/**
 * Anything that represents a simple rule that uses a range to define restrictions.
 *
 * @since [*next-version*]
 */
interface RangeRuleInterface extends RuleInterface
{
    /**
     * The start of the range.
     *
     * @since [*next-version*]
     *
     * @return mixed
     */
    public function getStart();

    /**
     * The start of the range.
     *
     * @since [*next-version*]
     *
     * @return mixed
     */
    public function getEnd();
}

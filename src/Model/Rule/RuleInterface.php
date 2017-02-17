<?php

namespace RebelCode\Bookings\Model\Rule;

use Dhii\Expression\LogicalExpressionInterface;

/**
 * Something that defines a rule that restricts availability.
 *
 * @since [*next-version*]
 */
interface RuleInterface extends LogicalExpressionInterface
{
    /**
     * Gets the type for this rule.
     *
     * @since [*next-version*]
     *
     * @return RuleTypeInterface The rule type.
     */
    public function getType();
}

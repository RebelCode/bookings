<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use \ArrayAccess;
use \Traversable;

/**
 * Something that defines a specific availability rule type.
 *
 * @since [*next-version*]
 */
interface RuleTypeInterface
{
    /**
     * The unique ID of the rule definition.
     *
     * @since [*next-version*]
     *
     * @return string The unique rule definition ID.
     */
    public function getId();

    /**
     * Gets the name of the rule type.
     *
     * @since [*next-version*]
     *
     * @return string The rule type name.
     */
    public function getName();

    /**
     * Creates a rule instance of this type using the given data.
     *
     * @since [*next-version*]
     *
     * @param array|ArrayAccess|Traversable The rule data. Default: array
     *
     * @return RuleInterface The created instance.
     */
    public function createRule($data = array());
}

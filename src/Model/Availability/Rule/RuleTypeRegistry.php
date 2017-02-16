<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use RebelCode\Bookings\Framework\Registry\AbstractRegistry;

/**
 * A registry of rule types.
 *
 * @since [*next-version*]
 */
class RuleTypeRegistry extends AbstractRegistry
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function __construct()
    {
        $this->clear();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function validate($item)
    {
        return $item instanceof RuleTypeInterface;
    }
}

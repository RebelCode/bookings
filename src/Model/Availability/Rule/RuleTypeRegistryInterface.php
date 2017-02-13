<?php

namespace RebelCode\Bookings\Model\Availability;

/**
 * Something that can act as a registry of rule types.
 *
 * @since [*next-version*]
 */
interface RuleTypeRegistryInterface
{
    /**
     * Gets the rule types in this registry.
     *
     * @since [*next-version*]
     *
     * @return RuleTypeInterface[] An array of rule type instances mapped to their respective IDs.
     */
    public function getRuleTypes();

    /**
     * Gets the rule type with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $id The ID of the rule type.
     *
     * @return RuleTypeInterface The rule type instance with the given ID.
     */
    public function getRuleType($id);
}

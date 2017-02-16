<?php

namespace RebelCode\Bookings\Framework\Collection;

/**
 * Something that represents a basic collection.
 *
 * @since [*next-version*]
 */
interface BaseCollectionInterface
{
    /**
     * Checks if an item exists in the collection.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to check for.
     *
     * @return bool True if the given item was found in this collection, false otherwise.
     */
    public function contains($item);

    /**
     * Determines whether the given item is a valid member of this collection.
     *
     * This is compatible with {@link https://github.com/Dhii/validator-interface/blob/master/src/ValidatorInterface.php ValidatorInterface}.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to validate.
     */
    public function validate($item);
}

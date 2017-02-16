<?php

namespace RebelCode\Bookings\Framework\Collection;

use Countable;
use Traversable;

/**
 * Something that represents a collection that can expose its contents or provide information
 * regarding its contents.
 *
 * @since [*next-version*]
 */
interface ReadableCollectionInterface extends Countable
{
    /**
     * Retrieves an item from the collection.
     *
     * @since [*next-version*]
     *
     * @param int|string $index The index of the item.
     *
     * @return mixed|null The item at the given index, null otherwise.
     */
    public function get($index);

    /**
     * Checks if an item exists at a specific index in the collection.
     *
     * @since [*next-version*]
     *
     * @param int|string $index The index of the item to look for.
     *
     * @return bool True if an item was found at the given index, false otherwise.
     */
    public function has($index);

    /**
     * Gets the index of a specific item in the collection.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to search for.
     *
     * @return int|string The index of the found item or -1 if the item was not found.
     */
    public function indexOf($item);

    /**
     * Gets all the items in this collection.
     *
     * @since [*next-version*]
     *
     * @return array|Traversable A list containing all the items in this collection.
     */
    public function items();
}

<?php

namespace RebelCode\Bookings\Framework\Collection;

/**
 * Something that represents a collection that can have its contents modified.
 *
 * @since [*next-version*]
 */
interface WriteableCollectionInterface
{
    /**
     * Adds an item to the collection.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to add.
     *
     * @return bool True if the item has been successfully added, false otherwise.
     */
    public function add($item);

    /**
     * Removes an item from the collection.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to remove.
     *
     * @return bool True if the item has been successfully removed, false otherwise.
     */
    public function remove($item);

    /**
     * Removes all items from the collection.
     *
     * @since [*next-version*]
     */
    public function clear();
}

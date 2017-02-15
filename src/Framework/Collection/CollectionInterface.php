<?php

namespace RebelCode\Bookings\Framework\Collection;

/**
 * Something that represents a collection of items.
 *
 * @since [*next-version*]
 */
interface CollectionInterface
{
    /**
     * Retrieves the items in this collection.
     *
     * @since [*next-version*]
     *
     * @return array|\Traversable The list of items in this collection.
     */
    public function getItems();
}

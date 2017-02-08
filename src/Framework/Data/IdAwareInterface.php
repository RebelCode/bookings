<?php

namespace RebelCode\Bookings\Framework\Data;

/**
 * An object that can have an ID.
 *
 * @since [*next-version*]
 */
interface IdAwareInterface
{
    /**
     * Gets the ID.
     * 
     * @since [*next-version*]
     *
     * @return int|string
     */
    public function getId();
}

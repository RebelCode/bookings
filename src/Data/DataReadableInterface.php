<?php

namespace RebelCode\Bookings\Data;

/**
 * @since [*next-version*]
 */
interface DataReadableInterface
{
    /**
     * Retrieve a piece of data, or all data, of this object.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface|null $key     The key, for which to retrieve the data member.
     * @param mixed                           $default What to return if data member with specified key not found.
     *
     * @return array|mixed The data member, or all data, of this object.
     */
    public function getData($key = null, $default = null);

    /**
     * Check if data exists.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable $key The key to check the data for. If null, checks if any data is set at all.
     *
     * @return bool True if data exists; false otherwise;
     */
    public function hasData($key = null);
}

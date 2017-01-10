<?php

namespace RebelCode\Bookings\Data;

/**
 * @since [*next-version*]
 */
interface DataWriteableInterface
{
    /**
     * Sets data members for this object.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface|array $key   The key for which to set a value, or a map of keys to values. In the latter case, the second parameter is ignored.
     * @param mixed                            $value The value to set for the specified key.
     */
    public function setData($key, $value = null);

    /**
     * Unsets data for this object.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface|null $key The key, for which to unset the data member. If null, will clear all data.
     */
    public function unsData($key = null);
}

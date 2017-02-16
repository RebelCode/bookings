<?php

namespace RebelCode\Bookings\Framework\Registry;

/**
 * Something that represents a registry that can be modified.
 *
 * @since [*next-version*]
 */
interface WriteableRegistryInterface
{
    /**
     * Registers an entry to the registry.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface $key   The key of the entry to register.
     * @param mixed                      $value The value to register.
     *
     * @return bool True if the item was successfully registered, false if not.
     */
    public function register($key, $value = null);

    /**
     * De-registers an entry from the registry.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface $key The key of the entry to de-register.
     *
     * @return bool True if the item was successfully de-registered, false if not.
     */
    public function deregister($key);
}

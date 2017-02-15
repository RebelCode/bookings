<?php

namespace RebelCode\Bookings\Framework\Registry;

use Dhii\Util\String\StringableInterface;

/**
 * Something that represents a registry.
 *
 * @since [*next-version*]
 */
interface RegistryInterface
{
    /**
     * Retrieves an entry from the registry.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface $key     The key of the entry to be retrieved.
     * @param mixed                      $default What to return if data member with specified key not found. Default: null
     *
     * @return array|mixed If $key is given and the key exists, the entry with the given key.
     *                     If the key does not exist, $default is returned.
     */
    public function get($key, $default = null);

    /**
     * Checks if the registry has an entry with a specific key.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable $key The key to check the data for.
     *
     * @return bool True if data exists; false otherwise;
     */
    public function has($key);

    /**
     * Registers an entry to the registry.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface $key   The key of the entry to register.
     * @param mixed                      $value The value to register.
     */
    public function register($key, $value = null);

    /**
     * Deregisters an entry from the registry.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface $key The key of the entry to deregister.
     */
    public function desregister($key);
}

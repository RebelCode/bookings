<?php

namespace RebelCode\Bookings\Framework\Registry;

/**
 * Basic functionality for a registry.
 *
 * @since [*next-version*]
 */
abstract class AbstractRegistry implements BaseRegistryInterface, ReadableRegistryInterface, WriteableRegistryInterface
{
    /**
     * The value used to signify that an item's index was not found in this collection.
     *
     * @since [*next-version*]
     */
    const INDEX_NOT_FOUND_VALUE = -1;

    /**
     * The collection items.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $items;

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function has($index)
    {
        return isset($this->items[$index]);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function get($index)
    {
        return $this->has($index)
            ? $this->items[$index]
            : null;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function indexOf($item)
    {
        $index = array_search($item, $this->items, true);

        return ($index === false)
            ? static::INDEX_NOT_FOUND_VALUE
            : $index;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function contains($item)
    {
        return $this->indexOf($item) !== static::INDEX_NOT_FOUND_VALUE;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function register($key, $value = null)
    {
        if (!$this->validate($value)) {
            return false;
        }

        $this->items[$key] = $value;

        return true;
    }
    
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function deregister($key)
    {
        if (!$this->has($key)) {
            return false;
        }

        unset($this->items[$key]);

        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @return $this This instance.
     */
    public function clear()
    {
        $this->items = array();

        return $this;
    }
}

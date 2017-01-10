<?php

namespace RebelCode\Bookings\Model;

use RebelCode\Bookings\Data\DataReadableInterface;
use RebelCode\Bookings\Data\DataWriteableInterface;
use RebelCode\Bookings\Storage\ResourceModelInterface;

/**
 * Any object that can be considered a "model".
 *
 * @since [*next-version*]
 */
interface ModelInterface extends DataReadableInterface, DataWriteableInterface
{
    /**
     * Gets the model's unique identifier.
     *
     * @since [*next-version*]
     *
     * @return int|string
     */
    public function getId();

    /**
     * Gets the resource model instance.
     *
     * @since [*next-version*]
     *
     * @return ResourceModelInterface The resource model instance.
     */
    public function getResource();
}

<?php

namespace RebelCode\Bookings\Framework\Data;

use Dhii\Data\IdAwareInterface;

/**
 * A data object that can have an ID.
 *
 * @since [*next-version*]
 */
interface IdAwareDataObjectInterface extends IdAwareInterface, DataObjectInterface
{
    /**
     * Gets the field name of the ID.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function getIdFieldName();
}

<?php

namespace RebelCode\Bookings\Model;

use RebelCode\Bookings\Data\IdAwareDataObjectInterface;
use RebelCode\Bookings\Storage\ResourceModelAwareInterface;

/**
 * Any object that can be considered a "model".
 *
 * @since [*next-version*]
 */
interface ModelInterface extends IdAwareDataObjectInterface, ResourceModelAwareInterface
{
}

<?php

namespace RebelCode\Bookings\Framework\Model;

use \RebelCode\Bookings\Framework;

/**
 * Any object that can be considered a "model".
 *
 * @since [*next-version*]
 */
interface ModelInterface extends
    Framework\Data\IdAwareDataObjectInterface,
    Framework\Storage\ResourceModelAwareInterface
{
}

<?php

namespace RebelCode\Bookings\Storage;

/**
 * Interface for objects that can have a resource model.
 *
 * @since [*next-version*]
 */
interface ResourceModelAwareInterface
{
    /**
     * Gets the resource model instance.
     *
     * @since [*next-version*]
     *
     * @return ResourceModelInterface The resource model instance.
     */
    public function getResourceModel();
}

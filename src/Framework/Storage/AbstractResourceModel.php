<?php

namespace RebelCode\Bookings\Framework\Storage;

use \Dhii\Storage\AdapterInterface;
use \RebelCode\Bookings\Framework\Model\GenericModel;

/**
 * Basic functionality of a resource model.
 *
 * @since [*next-version*]
 */
class AbstractResourceModel extends GenericModel
{
    /**
     * The storage adapter.
     *
     * @since [*next-version*]
     *
     * @var AdapterInterface
     */
    protected $storageAdapter;

    /**
     * Gets the storage adapter.
     *
     * @since [*next-version*]
     *
     * @return AdapterInterface The storage adapter instance.
     */
    protected function _getStorageAdapter()
    {
        return $this->storageAdapter;
    }

    /**
     * Sets the storage adapter.
     *
     * @param AdapterInterface $storageAdapter The storage adapter instance.
     *
     * @return $this This instance.
     */
    protected function _setStorageAdapter(AdapterInterface $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;

        return $this;
    }
}

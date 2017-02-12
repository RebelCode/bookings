<?php

namespace RebelCode\Bookings\Framework\Model;

use \RebelCode\Bookings\Framework\Data\MagicDataObject;
use \RebelCode\Bookings\Framework\Storage\ResourceModelInterface;

/**
 * Abstract implementation of a model.
 *
 * @since [*next-version*]
 */
abstract class AbstractModel extends MagicDataObject
{
    /**
     * The default ID field name.
     *
     * @since [*next-version*]
     */
    const DEFAULT_ID_FIELD_NAME = 'id';

    /**
     * The ID field name.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $idFieldName = null;

    /**
     * The resource model instance.
     *
     * @since [*next-version*]
     *
     * @var ResourceModelInterface
     */
    protected $resourceModel;

    /**
     * Gets the ID field name.
     *
     * @since [*next-version*]
     *
     * @return string The ID field name.
     */
    protected function _getIdFieldName()
    {
        return is_null($this->idFieldName)
            ? static::DEFAULT_ID_FIELD_NAME
            : $this->idFieldName;
    }

    /**
     * Sets the ID field name.
     *
     * @since [*next-version*]
     *
     * @param string $idFieldName
     *
     * @return $this
     */
    protected function _setIdFieldName($idFieldName)
    {
        $this->idFieldName = $idFieldName;

        return $this;
    }

    /**
     * Gets the ID.
     *
     * @since [*next-version*]
     *
     * @return int The ID.
     */
    protected function _getId()
    {
        return $this->getData($this->_getIdFieldName());
    }

    /**
     * Sets the ID.
     *
     * @since [*next-version*]
     *
     * @param int $id The ID.
     *
     * @return $this This instance.
     */
    protected function _setId($id)
    {
        $this->setData($this->_getIdFieldName(), $id);

        return $this;
    }

    /**
     * Gets the resource model.
     *
     * @since [*next-version*]
     *
     * @return ResourceModelInterface The resource model instance.
     */
    protected function _getResourceModel()
    {
        return $this->resourceModel;
    }

    /**
     * Sets the resource model.
     *
     * @since [*next-version*]
     *
     * @param ResourceModelInterface $resourceModel The resource model instance. Default: null
     *
     * @return $this This instance.
     */
    protected function _setResourceModel(ResourceModelInterface $resourceModel = null)
    {
        $this->resourceModel = $resourceModel;

        return $this;
    }
}

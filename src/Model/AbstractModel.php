<?php

namespace RebelCode\Bookings\Model;

use RebelCode\Bookings\Data\DataObject;
use RebelCode\Bookings\Storage\ResourceModelInterface;

/**
 * Abstract implementation of a model.
 *
 * @since [*next-version*]
 */
abstract class AbstractModel extends DataObject implements ModelInterface
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
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getIdFieldName()
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
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getId()
    {
        return $this->getData($this->getIdFieldName());
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
        $this->setData($this->getIdFieldName(), $id);

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getResourceModel()
    {
        return $this->resourceModel;
    }

    /**
     * Sets the resource model instance.
     *
     * @since [*next-version*]
     *
     * @param ResourceModelInterface $resourceModel The resource model instance.
     *
     * @return $this This instance.
     */
    protected function _setResourceModel(ResourceModelInterface $resourceModel)
    {
        $this->resourceModel = $resourceModel;

        return $this;
    }
}

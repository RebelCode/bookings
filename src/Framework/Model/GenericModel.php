<?php

namespace RebelCode\Bookings\Framework\Model;

use \RebelCode\Bookings\Framework\Storage\ResourceModelInterface;

/**
 * Concrete implementation of a model - useful for generic model types.
 *
 * @since [*next-version*]
 */
class GenericModel extends AbstractModel implements ModelInterface
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param array $data Optional array of data. Default: array
     * @param ResourceModelInterface $resourceModel The resource model instance. Default: null
     */
    public function __construct(array $data = array(), ResourceModelInterface $resourceModel = null)
    {
        parent::__construct($data);
        $this->setResourceModel($resourceModel);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getIdFieldName()
    {
        return $this->_getIdFieldName();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getId()
    {
        return $this->_getId();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getResourceModel()
    {
        return $this->_getResourceModel();
    }

    /**
     * Sets the model ID.
     *
     * @since [*next-version*]
     *
     * @param int $id The ID.
     *
     * @return $this This instance.
     */
    public function setId($id)
    {
        $this->_setId($id);

        return $this;
    }

    /**
     * Sets the ID field name.
     *
     * @since [*next-version*]
     *
     * @param string $idFieldName The ID field name.
     *
     * @return $this This instance.
     */
    public function setIdFieldName($idFieldName)
    {
        $this->_setIdFieldName($idFieldName);

        return $this;
    }

    /**
     * Sets the resource model.
     *
     * @param ResourceModelInterface $resourceModel The resource model instance.
     *
     * @return $this This instance.
     */
    public function setResourceModel(ResourceModelInterface $resourceModel)
    {
        $this->_setResourceModel($resourceModel);

        return $this;
    }
}

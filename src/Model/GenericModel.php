<?php

namespace RebelCode\Bookings\Model;

use RebelCode\Bookings\Storage\ResourceModelInterface;

/**
 * Concrete implementation of a model - useful for generic model types.
 *
 * @since [*next-version*]
 */
class GenericModel extends AbstractModel
{
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

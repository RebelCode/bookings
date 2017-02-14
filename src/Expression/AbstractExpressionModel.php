<?php

namespace RebelCode\Bookings\Expression;

use Dhii\Expression\ExpressionInterface;
use RebelCode\Bookings\Framework\Model\BaseModel;

/**
 * Basic functionality for an expression that is also a model.
 *
 * @since [*next-version*]
 */
abstract class AbstractExpressionModel extends BaseModel implements ExpressionInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getTerms()
    {
        return $this->getData('terms', array());
    }
}

<?php

namespace RebelCode\Bookings\Expression;

use Dhii\Expression\LogicalExpressionInterface;

/**
 * Basic functionality for a logical expression that is also a model.
 *
 * @since [*next-version*]
 */
abstract class AbstractLogicalExpressionModel extends AbstractExpressionModel implements LogicalExpressionInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function isNegated()
    {
        return $this->setData('negated', false);
    }
}

<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use Dhii\Data\ValueAwareInterface;
use Dhii\Espresso\EvaluationException;
use RebelCode\Bookings\Expression\AbstractLogicalExpressionModel;
use RebelCode\Bookings\Expression\BookingContext;
use RebelCode\Diary\BookingInterface;

/**
 * Basic functionality for a rule.
 *
 * @since [*next-version*]
 */
abstract class AbstractRule extends AbstractLogicalExpressionModel implements RuleInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getType()
    {
        return $this->getData('type', null);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function evaluate(ValueAwareInterface $ctx = null)
    {
        if (!$ctx instanceof BookingContext) {
            throw new EvaluationException(
                sprintf(
                    '%1$s::%2$s() expects args #1 to be a BookingContext. %2$s given.',
                    get_called_class(), __METHOD__, is_null($ctx)? 'null' : get_class($ctx)
                )
            );
        }

        return $this->bookingObeysRule($ctx->getValue());
    }

    /**
     * Asserts whether a given booking obeys this rule.
     *
     * @since [*next-version*]
     *
     * @param BookingInterface $booking The booking to check.
     *
     * @return bool True if the booked obeys this rule, false if not.
     */
    abstract public function bookingObeysRule(BookingInterface $booking);
}

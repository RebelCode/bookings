<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use Dhii\Espresso\Term\LiteralTerm;

/**
 * Basic functionality for a range rule.
 *
 * @since [*next-version*]
 */
abstract class AbstractRangeRule extends AbstractRule implements RangeRuleInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getStart()
    {
        return $this->getData('start');
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getEnd()
    {
        return $this->getData('end');
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getTerms()
    {
        return array(
            new LiteralTerm($this->getStart()),
            new LiteralTerm($this->getEnd()),
        );
    }

    /**
     * Simple integer range check.
     *
     * @since [*next-version*]
     *
     * @param int  $subject    The integer value to check.
     * @param int  $rangeStart The start value of the range.
     * @param int  $rangeEnd   The end value of the range.
     * @param bool $startInc   The start range value inclusivity. False for exclusivity. Default: true
     * @param bool $endInc     The end range value inclusivity. False for exclusivity. Default: true
     *
     * @return bool True if the subject lies within the range, false if not.
     */
    protected function _isInRange(
        $subject,
        $rangeStart,
        $rangeEnd,
        $startInc = true,
        $endInc = true
    ) {
        $gtStart = ($startInc)
            ? $subject >= $rangeStart
            : $subject > $rangeStart;

        $ltEnd = ($endInc)
            ? $subject <= $rangeEnd
            : $subject < $rangeEnd;

        return $gtStart && $ltEnd;
    }
}

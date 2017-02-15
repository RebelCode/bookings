<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability\Rule;

use Dhii\Espresso\Term\LiteralTerm;
use RebelCode\Bookings\Model\Availability\Rule\AbstractRangeRule;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\Rule\AbstractRangeRule}.
 *
 * @since [*next-version*]
 */
class AbstractRangeRuleTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Availability\\Rule\\AbstractRangeRule';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param mixed $start The start value for the range. Default: null
     * @param mixed $end   The end value for the range. Default: null
     * @param mixed $eval  The evaluation result for `bookingObeysRule()`. Default: false
     *
     * @return AbstractRangeRule
     */
    public function createInstance($start = null, $end = null, $eval = false)
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->bookingObeysRule($eval)
            ->new();

        $mock->setData(array(
            'start' => $start,
            'end' => $end,
        ));

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance(null, null);

        $this->assertInstanceOf(
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
    }

    /**
     * Tests the range start value getter.
     *
     * @since [*next-version*]
     */
    public function testGetStart()
    {
        $subject = $this->createInstance();

        $subject->setData('start', 5);

        $this->assertEquals(5, $subject->getStart());
    }

    /**
     * Tests the range end value getter.
     *
     * @since [*next-version*]
     */
    public function testGetEnd()
    {
        $subject = $this->createInstance();

        $subject->setData('end', 10);

        $this->assertEquals(10, $subject->getEnd());
    }

    /**
     * Tests the terms getter.
     *
     * @since [*next-version*]
     */
    public function testGetTerms()
    {
        $subject = $this->createInstance(12, 18);

        $expected = array(
            new LiteralTerm(12),
            new LiteralTerm(18),
        );

        $this->assertEquals($expected, $subject->getTerms());
    }

    /**
     * Tests the in-range check method with a value that lies inside the range.
     *
     * @since [*next-version*]
     */
    public function testIsInRange()
    {
        $subject = $this->createInstance();

        $value = 8;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies inside the range and with the
     * range start value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeStartExclusive()
    {
        $subject = $this->createInstance();

        $value = 8;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies inside the range and with the
     * range end value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeEndExclusive()
    {
        $subject = $this->createInstance();

        $value = 8;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies inside the range and with both
     * range values being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeBothExclusive()
    {
        $subject = $this->createInstance();

        $value = 8;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range start value.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnStart()
    {
        $subject = $this->createInstance();

        $value = 5;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range start value and
     * with the range start value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnStartWithStartExclusive()
    {
        $subject = $this->createInstance();

        $value = 5;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertFalse($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range start value and
     * with the range end value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnStartWithEndExclusive()
    {
        $subject = $this->createInstance();

        $value = 5;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range start value and
     * with both range values being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnStartBothExclusive()
    {
        $subject = $this->createInstance();

        $value = 5;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertFalse($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range end value.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnEnd()
    {
        $subject = $this->createInstance();

        $value = 10;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range end value and
     * with the range end value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnEndExclusive()
    {
        $subject = $this->createInstance();

        $value = 10;
        $start = 5;
        $end = 10;
        $startInc = true;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertFalse($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range end value and
     * with the range start value being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnEndWithStartExclusive()
    {
        $subject = $this->createInstance();

        $value = 10;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = true;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertTrue($inRange);
    }

    /**
     * Tests the in-range check method with a value that lies on the range end value and
     * with both range values being exclusive.
     *
     * @since [*next-version*]
     */
    public function testIsInRangeOnEndBothExclusive()
    {
        $subject = $this->createInstance();

        $value = 10;
        $start = 5;
        $end = 10;
        $startInc = false;
        $endInc = false;

        $inRange = $subject->this()->_isInRange($value, $start, $end, $startInc, $endInc);

        $this->assertFalse($inRange);
    }
}

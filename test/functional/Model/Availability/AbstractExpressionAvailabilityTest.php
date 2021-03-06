<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability;

use RebelCode\Bookings\Model\Availability\AbstractExpressionAvailability;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\AbstractExpressionAvailability}.
 *
 * @since [*next-version*]
 */
class AbstractExpressionAvailabilityTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Availability\\AbstractExpressionAvailability';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AbstractExpressionAvailability
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->canBook()
            ->getExpression()
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
    }
}

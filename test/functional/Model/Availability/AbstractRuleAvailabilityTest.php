<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability;

use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\AbstractRuleAvailability}.
 *
 * @since [*next-version*]
 */
class AbstractRuleAvailabilityTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Availability\\AbstractRuleAvailability';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RebelCode\Bookings\Model\Availability\AbstractRuleAvailability
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

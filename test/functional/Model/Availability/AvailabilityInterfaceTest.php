<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability;

use RebelCode\Bookings\Model\Availability\AvailabilityInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\AvailabilityInterface}.
 *
 * @since [*next-version*]
 */
class AvailabilityInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Availability\\AvailabilityInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AvailabilityInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->canBook()
            ->getId()
            ->getIdFieldName()
            ->hasData()
            ->getData()
            ->setData()
            ->unsData()
            ->getResourceModel()
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
            static::TEST_SUBJECT_CLASSNAME, $subject,
            'Subject is not a valid instance.'
        );

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Validation\\BookingValidatorInterface', $subject,
            'Subject is not a valid instance.'
        );
    }
}

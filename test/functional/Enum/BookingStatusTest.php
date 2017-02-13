<?php

namespace RebelCode\Bookings\FuncTest\Enum;

use RebelCode\Bookings\Enum\BookingStatus;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Enum\BookingStatus}.
 *
 * @since [*next-version*]
 */
class BookingStatusTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Enum\\BookingStatus';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return BookingStatus
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->methods()
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
            'MyCLabs\\Enum\\Enum', $subject,
            'Subject is not a valid Enum instance.'
        );
    }
}

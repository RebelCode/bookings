<?php

namespace RebelCode\Bookings\FuncTest\Validation;

use RebelCode\Bookings\Validation\BookingValidatorInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Validation\BookingValidatorInterface}.
 *
 * @since [*next-version*]
 */
class BookingValidatorInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Validation\\BookingValidatorInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return BookingValidatorInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->canBook()
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
    }
}

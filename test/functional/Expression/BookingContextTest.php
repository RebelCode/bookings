<?php

namespace RebelCode\Bookings\FuncTest\Expression;

use RebelCode\Bookings\Expression\BookingContext;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Expression\BookingContext}.
 *
 * @since [*next-version*]
 */
class BookingContextTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Expression\\BookingContext';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return BookingContext
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
            'Dhii\\Expression\\ContextInterface', $subject,
            'Subject is not a valid instance.'
        );
    }
}

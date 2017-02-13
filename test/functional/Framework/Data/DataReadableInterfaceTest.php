<?php

namespace RebelCode\Bookings\FuncTest\Framework\Data;

use RebelCode\Bookings\Framework\Data\DataReadableInterface;
use Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\Data\DataReadableInterface}.
 *
 * @since [*next-version*]
 */
class DataReadableInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\DataReadableInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return DataReadableInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getData()
            ->hasData()
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

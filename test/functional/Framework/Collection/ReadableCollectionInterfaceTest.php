<?php

namespace RebelCode\Bookings\FuncTest\Framework\Collection;

use RebelCode\Bookings\Framework\Collection\ReadableCollectionInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Collection\ReadableCollectionInterface}.
 *
 * @since [*next-version*]
 */
class ReadableCollectionInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Collection\\ReadableCollectionInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ReadableCollectionInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->get()
            ->has()
            ->indexOf()
            ->items()
            ->count()
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

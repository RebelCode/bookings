<?php

namespace RebelCode\Bookings\FuncTest\Framework\Registry;

use RebelCode\Bookings\Framework\Registry\ReadableRegistryInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Registry\ReadableRegistryInterface}.
 *
 * @since [*next-version*]
 */
class ReadableRegistryInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Registry\\ReadableRegistryInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ReadableRegistryInterface
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
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Collection\\ReadableCollectionInterface',
            $subject, 'Subject is not a valid ReadableCollectionInterface instance.'
        );
    }
}

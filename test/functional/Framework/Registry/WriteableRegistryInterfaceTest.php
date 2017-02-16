<?php

namespace RebelCode\Bookings\FuncTest\Framework\Registry;

use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Registry\WriteableRegistryInterface}.
 *
 * @since [*next-version*]
 */
class WriteableRegistryInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Registry\\WriteableRegistryInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RebelCode\Bookings\Framework\Registry\WriteableRegistryInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->register()
            ->deregister()
            ->clear()
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

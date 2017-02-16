<?php

namespace RebelCode\Bookings\FuncTest\Framework\Registry;

use RebelCode\Bookings\Framework\Registry\RegistryInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Registry\RegistryInterface}.
 *
 * @since [*next-version*]
 */
class RegistryInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Registry\\RegistryInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RegistryInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->contains()
            ->validate()
            ->get()
            ->has()
            ->indexOf()
            ->items()
            ->count()
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
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Registry\\BaseRegistryInterface',
            $subject, 'Subject is not a valid BaseRegistryInterface instance.'
        );
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Registry\\ReadableRegistryInterface',
            $subject, 'Subject is not a valid ReadableRegistryInterface instance.'
        );
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Registry\\WriteableRegistryInterface',
            $subject, 'Subject is not a valid WriteableRegistryInterface instance.'
        );
    }
}

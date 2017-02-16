<?php

namespace RebelCode\Bookings\FuncTest\Framework\Registry;

use RebelCode\Bookings\Framework\Registry\BaseRegistryInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Registry\BaseRegistryInterface}.
 *
 * @since [*next-version*]
 */
class BaseRegistryInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Registry\\BaseRegistryInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return BaseRegistryInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->contains()
            ->validate()
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
            'RebelCode\\Bookings\\Framework\\Collection\\BaseCollectionInterface',
            $subject, 'Subject is not a valid BaseCollectionInterface instance.'
        );
    }
}

<?php

namespace RebelCode\Bookings\Storage\Test;

/**
 * Tests {@see \RebelCode\Bookings\Storage\ResourceModelAwareInterface}.
 *
 * @since [*next-version*]
 */
class ResourceModelAwareInterfaceTest extends \Xpmock\TestCase
{

    /**
     * The name of the test subject.
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Storage\\ResourceModelAwareInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \RebelCode\Bookings\Storage\ResourceModelAwareInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getResourceModel()
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @covers \RebelCode\Bookings\Storage\ResourceModelAwareInterface
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject);
    }

}

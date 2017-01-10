<?php

namespace RebelCode\Bookings\Storage\Test;

/**
 * Tests {@see \RebelCode\Bookings\Storage\ResourceModelInterface}.
 *
 * @since [*next-version*]
 */
class ResourceModelInterfaceTest extends \Xpmock\TestCase
{
    /**
     * The name of the test subject.
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Storage\\ResourceModelInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \RebelCode\Bookings\Storage\ResourceModelInterface
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
     * @covers \RebelCode\Bookings\Storage\ResourceModelInterface
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject);
        $this->assertInstanceOf('RebelCode\\Bookings\\Data\\IdAwareDataObjectInterface', $subject);
    }
}

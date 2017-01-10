<?php

namespace RebelCode\Bookings\Data\Test;

/**
 * Tests {@see \RebelCode\Bookings\Data\DataWriteableInterface}.
 *
 * @since [*next-version*]
 */
class DataWriteableInterfaceTest extends \Xpmock\TestCase
{

    /**
     * The name of the test subject.
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Data\\DataWriteableInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \RebelCode\Bookings\Data\DataWriteableInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->setData()
            ->unsData()
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @covers \RebelCode\Bookings\Data\DataWriteableInterface
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject);
    }

}

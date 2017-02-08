<?php

namespace RebelCode\Bookings\FuncTest\Framework\Data;

use \RebelCode\Bookings\Framework\Data\DataWriteableInterface;
use \Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\Data\DataWriteableInterface}.
 *
 * @since [*next-version*]
 */
class DataWriteableInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\DataWriteableInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return DataWriteableInterface
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

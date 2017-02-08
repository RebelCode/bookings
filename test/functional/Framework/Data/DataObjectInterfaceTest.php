<?php

namespace RebelCode\Bookings\FuncTest\Framework\Data;

use \RebelCode\Bookings\Framework\Data\DataObjectInterface;
use \Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\Data\DataObjectInterface}.
 *
 * @since [*next-version*]
 */
class DataObjectInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\DataObjectInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return DataObjectInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getData()
            ->hasData()
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

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Data\\DataReadableInterface', $subject,
            'Subject is not a valid DataReadableInterface instance.'
        );

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Data\\DataWriteableInterface', $subject,
            'Subject is not a valid DataWriteableInterface instance.'
        );
    }
}

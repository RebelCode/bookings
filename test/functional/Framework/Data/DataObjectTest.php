<?php

namespace RebelCode\Bookings\FuncTest\Framework\Data;

use \RebelCode\Bookings\Data\DataObject;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Data\DataObject}.
 *
 * @since [*next-version*]
 */
class DataObjectTest extends TestCase
{
    /**
     * The class name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\DataObject';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return DataObject
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
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
            'RebelCode\\Bookings\\Framework\\Data\\DataObjectInterface', $subject,
            'Subject is not a valid DataObject instance.'
        );
    }
}

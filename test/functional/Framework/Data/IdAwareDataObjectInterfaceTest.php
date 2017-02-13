<?php

namespace RebelCode\Bookings\FuncTest\Framework\Data;

use RebelCode\Bookings\Framework\Data\IdAwareDataObjectInterface;
use Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\Data\IdAwareDataObjectInterface}.
 *
 * @since [*next-version*]
 */
class IdAwareDataObjectInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\IdAwareDataObjectInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return IdAwareDataObjectInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getId()
            ->getIdFieldName()
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
            'RebelCode\\Bookings\\Framework\\Data\\DataObjectInterface', $subject,
            'Subject is not a valid DataObjectInterface instance.'
        );

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Data\\IdAwareInterface', $subject,
            'Subject is not a valid IdAwareInterface instance.'
        );
    }
}

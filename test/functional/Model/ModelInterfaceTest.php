<?php

namespace RebelCode\Bookings\Model\Test;

/**
 * Tests {@see \RebelCode\Bookings\Model\ModelInterface}.
 *
 * @since [*next-version*]
 */
class ModelInterfaceTest extends \Xpmock\TestCase
{
    /**
     * The name of the test subject.
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\ModelInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \RebelCode\Bookings\Model\ModelInterface
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
            ->getResourceModel()
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @covers \RebelCode\Bookings\Model\ModelInterface
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject);
        $this->assertInstanceOf('RebelCode\\Bookings\\Data\\IdAwareDataObjectInterface', $subject);
        $this->assertInstanceOf('RebelCode\\Bookings\\Storage\\ResourceModelAwareInterface', $subject);
    }
}

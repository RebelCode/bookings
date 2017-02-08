<?php

namespace RebelCode\Bookings\FuncTest\Framework\Model;

use \RebelCode\Bookings\Framework\Model\ModelInterface;
use \Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\Model\ModelInterface}.
 *
 * @since [*next-version*]
 */
class ModelInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Model\\ModelInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ModelInterface
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
            'RebelCode\\Bookings\\Framework\\Data\\IdAwareDataObjectInterface', $subject,
            'Subject is not a valid IdAwareDataObjectInterface instance.'
        );

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Storage\\ResourceModelAwareInterface', $subject,
            'Subject is not a valid ResourceModelAwareInterface instance.'
        );
    }
}

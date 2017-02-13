<?php

namespace RebelCode\Bookings\FuncTest\Model\Service;

use RebelCode\Bookings\Model\Service\ServiceInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Service\ServiceInterface}.
 *
 * @since [*next-version*]
 */
class ServiceInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Service\\ServiceInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ServiceInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getAvailability()
            ->getPrice()
            ->getIdFieldName()
            ->getId()
            ->getData()
            ->setData()
            ->hasData()
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
            'RebelCode\\Bookings\\Framework\\Model\\ModelInterface', $subject,
            'Subject is not a valid instance.'
        );
    }
}

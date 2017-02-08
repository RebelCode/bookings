<?php

namespace RebelCode\Bookings\FuncTest\Model\Service;

use \RebelCode\Bookings\Model\Service\SessionServiceInterface;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Service\SessionServiceInterface}.
 *
 * @since [*next-version*]
 */
class SessionServiceInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Service\\SessionServiceInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return SessionServiceInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getAvailability()
            ->getPrice()
            ->getSessionPrice()
            ->getMinSessions()
            ->getMaxSessions()
            ->getSessionLength()
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
            'RebelCode\\Bookings\\Model\\Service\\ServiceInterface', $subject,
            'Subject is not a valid instance.'
        );
    }
}

<?php

namespace RebelCode\Bookings\FuncTest\Framework\Storage;

use RebelCode\Bookings\Framework\Storage\ResourceModelInterface;
use Xpmock\TestCase;

/**
 * Tests {@see \RebelCode\Bookings\Framework\ResourceModelInterface}.
 *
 * @since [*next-version*]
 */
class ResourceModelInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Storage\\ResourceModelInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ResourceModelInterface
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
            ->save()
            ->load()
            ->delete()
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
            'Subject is not a valid ModelInterface instance.'
        );
    }
}

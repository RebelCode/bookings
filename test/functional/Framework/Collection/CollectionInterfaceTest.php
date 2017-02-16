<?php

namespace RebelCode\Bookings\FuncTest\Framework\Collection;

use RebelCode\Bookings\Framework\Collection\CollectionInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Collection\CollectionInterface}.
 *
 * @since [*next-version*]
 */
class CollectionInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Collection\\CollectionInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return CollectionInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->contains()
            ->validate()
            ->get()
            ->has()
            ->indexOf()
            ->items()
            ->count()
            ->add()
            ->remove()
            ->clear()
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
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Collection\\BaseCollectionInterface',
            $subject, 'Subject is not a valid BaseCollectionInterface instance.'
        );
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Collection\\ReadableCollectionInterface',
            $subject, 'Subject is not a valid ReadableCollectionInterface instance.'
        );
        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Collection\\WriteableCollectionInterface',
            $subject, 'Subject is not a valid WriteableCollectionInterface instance.'
        );
    }
}

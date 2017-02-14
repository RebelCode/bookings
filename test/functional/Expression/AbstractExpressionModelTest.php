<?php

namespace RebelCode\Bookings\FuncTest\Expression;

use RebelCode\Bookings\Expression\AbstractExpressionModel;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Expression\AbstractExpressionModel}.
 *
 * @since [*next-version*]
 */
class AbstractExpressionModelTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Expression\\AbstractExpressionModel';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AbstractExpressionModel
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->evaluate()
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
    }
}

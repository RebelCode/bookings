<?php

namespace RebelCode\Bookings\FuncTest\Model\Rule;

use RebelCode\Bookings\Model\Rule\RuleInterface;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Rule\RuleInterface}.
 *
 * @since [*next-version*]
 */
class RuleInterfaceTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Rule\\RuleInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RuleInterface
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->getTerms()
            ->evaluate()
            ->isNegated()
            ->getType()
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
            'Dhii\\Expression\\ExpressionInterface', $subject,
            'Subject is not a valid ExpressionInterface instance.'
        );
    }
}

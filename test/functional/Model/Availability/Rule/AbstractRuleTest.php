<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability\Rule;

use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\Rule\AbstractRule}.
 *
 * @since [*next-version*]
 */
class AbstractRuleTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Model\\Availability\\Rule\\AbstractRule';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RebelCode\Bookings\Model\Availability\Rule\AbstractRule
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->evaluate()
            ->isNegated()
            ->getTerms()
            ->bookingObeysRule()
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
            'RebelCode\\Bookings\\Model\\Availability\\Rule\\RuleInterface',
            $subject, 'Subject is not a valid RuleInterface instance.'
        );
    }
}

<?php

namespace RebelCode\Bookings\Test\Model\Availability;

use \Dhii\Espresso\Expression\OrExpression;
use \RebelCode\Bookings\Model\Availability\RuleAvailability;
use \RebelCode\Bookings\Model\Availability\RuleInterface;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\RuleAvailability}.
 *
 * @since [*next-version*]
 */
class RuleAvailabilityTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return RuleAvailability The created instance.
     */
    public function createInstance()
    {
        return new RuleAvailability();
    }

    /**
     * Creates a mock of a rule that evaluates using a callback.
     *
     * @since [*next-version*]
     *
     * @param callable $evaluation The callback.
     * @return RuleInterface The expression mock instance.
     */
    public function mockRule($evaluation)
    {
        return $this->mock('RebelCode\\Bookings\\Model\\Availability\\Rule\\RuleInterface')
            ->evaluate(function ($context) use ($evaluation) {
                return $evaluation($context);
            })
            ->getTerms()
            ->isNegated(false)
            ->getType()
            ->new();
    }

    /**
     * Tests the expression getter to ensure that the rules are correctly retrieved in an
     * AndExpression instance.
     *
     * @since [*next-version*]
     */
    public function testGetExpression()
    {
        $subject = $this->createInstance();

        $subject->setRules(array(
            $this->mockRule(function () { return true; }),
            $this->mockRule(function () { return true; })
        ));

        $expected = new OrExpression(array(
            $this->mockRule(function () { return true; }),
            $this->mockRule(function () { return true; })
        ));

        $this->assertEquals($expected, $subject->getExpression());
    }
}

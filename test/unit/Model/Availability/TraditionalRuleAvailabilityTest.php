<?php

namespace RebelCode\Bookings\Test\Model\Availability;

use Dhii\Espresso\Expression\AndExpression;
use Dhii\Espresso\Expression\OrExpression;
use RebelCode\Bookings\Model\Rule\RuleInterface;
use RebelCode\Bookings\Model\Availability\TraditionalRuleAvailability;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\TraditionalRuleAvailability}.
 *
 * @since [*next-version*]
 */
class TraditionalRuleAvailabilityTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return TraditionalRuleAvailability The created instance.
     */
    public function createInstance()
    {
        return new TraditionalRuleAvailability();
    }

    /**
     * Creates a mock of a rule that evaluates using a callback.
     *
     * @since [*next-version*]
     *
     * @param bool $negated The negation
     *
     * @return RuleInterface The expression mock instance.
     */
    public function mockRule($negated)
    {
        $mock = $this->mock('RebelCode\\Bookings\\Model\\Rule\\RuleInterface')
            ->evaluate()
            ->getTerms()
            ->isNegated($negated)
            ->getType()
            ->new();

        $mock->negated = $negated;

        return $mock;
    }

    /**
     * Tests the expression getter to ensure that the rules are correctly retrieved.
     *
     * @since [*next-version*]
     */
    public function testGetExpression()
    {
        $subject = $this->createInstance();

        $subject->setRules(array(
            $this->mockRule(false),
            $this->mockRule(false),
            $this->mockRule(true),
            $this->mockRule(true),
            $this->mockRule(false),
            $this->mockRule(true),
        ));

        $expected = new AndExpression(array(
            new OrExpression(array(
                new AndExpression(array(
                    new OrExpression(array(
                        $this->mockRule(false),
                        $this->mockRule(false),
                    )),
                    $this->mockRule(true),
                    $this->mockRule(true),
                )),
                $this->mockRule(false),
            )),
            $this->mockRule(true),
        ));

        $this->assertEquals($expected, $subject->getExpression());
    }
}

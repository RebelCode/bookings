<?php

namespace RebelCode\Bookings\FuncTest\Model\Availability\Rule;

use Dhii\Espresso\Context\RawContext;
use RebelCode\Bookings\Expression\BookingContext;
use RebelCode\Bookings\Model\Availability\Rule\AbstractRule;
use RebelCode\Bookings\Model\Availability\Rule\RuleTypeInterface;
use RebelCode\Diary\BookingInterface;
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
     * The interface name for a rule type.
     *
     * @since [*next-version*]
     */
    const RULE_TYPE_INTERFACE = 'RebelCode\\Bookings\\Model\\Availability\\Rule\\RuleTypeInterface';

    /**
     * The interface name for a booking.
     *
     * @since [*next-version*]
     */
    const BOOKING_INTERFACE = 'RebelCode\\Diary\\BookingInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param mixed $eval The evaluation result for `bookingObeysRule()`. Default: false
     *
     * @return AbstractRule
     */
    public function createInstance($eval = false)
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->bookingObeysRule($eval)
            ->new();

        return $mock;
    }

    /**
     * Creates a mock for a rule type instance.
     *
     * @since [*next-version*]
     *
     * @param string $id   The rule type ID.
     * @param string $name The rule type name.
     *
     * @return RuleTypeInterface
     */
    public function mockRuleType($id, $name)
    {
        $mock = $this->mock(static::RULE_TYPE_INTERFACE)
            ->getId($id)
            ->getName($id)
            ->createRule()
            ->new();

        // Attributes for comparing instances when asserting equivalence
        $mock->id   = $id;
        $mock->name = $name;

        return $mock;
    }

    /**
     * Creates a mock instance for a booking.
     *
     * @since [*next-version*]
     *
     * @return BookingInterface
     */
    public function mockBooking()
    {
        $mock = $this->mock(static::BOOKING_INTERFACE)
            ->getId(0)
            ->getPeriod(null)
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

    /**
     * Tests the rule type getter method to ensure that the correct value and instance
     * are returned.
     *
     * @since [*next-version*]
     */
    public function testgetType()
    {
        $subject = $this->createInstance();

        $ruleType = $this->mockRuleType('test', 'Test Type');

        $subject->setData(array(
            'type' => $ruleType,
        ));

        $this->assertTrue($ruleType === $subject->getType());
    }

    /**
     * Tests the evaluation with a booking context.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithBookingContext()
    {
        $subject = $this->createInstance('test_result');

        $ctx = new BookingContext($this->mockBooking());

        $this->assertEquals('test_result', $subject->evaluate($ctx));
    }

    /**
     * Tests the evaluation with a context that is not a booking context.
     * An exception should be thrown.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithWrongContext()
    {
        $subject = $this->createInstance('test_result');

        // booking instance not important. hence null
        $ctx = new RawContext($this->mockBooking());

        $this->setExpectedException('Dhii\\Evaluable\\EvaluationExceptionInterface');

        $this->assertEquals('test_result', $subject->evaluate($ctx));
    }

    /**
     * Tests the evaluation without a context.
     * An exception should be thrown.
     *
     * @since [*next-version*]
     */
    public function testEvaluateWithoutContext()
    {
        $subject = $this->createInstance('test_result');

        $this->setExpectedException('Dhii\\Evaluable\\EvaluationExceptionInterface');

        $this->assertEquals('test_result', $subject->evaluate());
    }
}

<?php

namespace RebelCode\Bookings\Test\Model\Availability;

use \Dhii\Espresso\Expression\OrExpression;
use \Dhii\Espresso\Term\LiteralTerm;
use \Dhii\Expression\ExpressionInterface;
use \RebelCode\Bookings\Expression\BookingContext;
use \RebelCode\Bookings\Model\Availability\ExpressionAvailability;
use \RebelCode\Bookings\Model\Booking\SimpleBooking;
use \RebelCode\Diary\DateTime\DateTime;
use \RebelCode\Diary\DateTime\Period;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\ExpressionAvailability}.
 *
 * @since [*next-version*]
 */
class ExpressionAvailabilityTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return ExpressionAvailability
     */
    public function createInstance()
    {
        return new ExpressionAvailability();
    }

    /**
     * Creates a mock of an expression that evaluates using a callback.
     *
     * @since [*next-version*]
     *
     * @param callable $evaluation The callback.
     * @return ExpressionInterface The expression mock instance.
     */
    public function mockExpression($evaluation)
    {
        return $this->mock('Dhii\\Expression\\AbstractExpression')
            ->evaluate(function ($context) use ($evaluation) {
                return $evaluation($context);
            })
            ->new();
    }

    /**
     * Tests the functionality without a context and an expression that always evaluates
     * to true.
     *
     * @since [*next-version*]
     */
    public function testCanBookNoContextTrue()
    {
        $subject = $this->createInstance();

        $period     = new Period(
            DateTime::parse('Today 10:00'),
            DateTime::parse('Today 11:00')
        );
        $booking    = new SimpleBooking(array(
            'id'     => 0,
            'period' => $period
        ));
        $expression = new OrExpression(array(
            new LiteralTerm(true)
        ));

        $subject->setExpression($expression);

        $this->assertTrue($subject->canBook($booking));
    }

    /**
     * Tests the functionality without a context and an expression that always evaluates
     * to false.
     *
     * @since [*next-version*]
     */
    public function testCanBookNoContextFalse()
    {
        $subject = $this->createInstance();

        $period     = new Period(
            DateTime::parse('Today 10:00'),
            DateTime::parse('Today 11:00')
        );
        $booking    = new SimpleBooking(array(
            'id'     => 0,
            'period' => $period
        ));
        $expression = new OrExpression(array(
            new LiteralTerm(false)
        ));

        $subject->setExpression($expression);

        $this->assertFalse($subject->canBook($booking));
    }

    /**
     * Tests the functionality with a context to ensure that the expression correctly
     * uses the booking context to evaluate to true.
     *
     * @since [*next-version*]
     */
    public function testCanBookWithContextTrue()
    {
        $subject = $this->createInstance();

        $period     = new Period(
            DateTime::parse('Today 10:00'),
            DateTime::parse('Today 11:00')
        );
        $booking    = new SimpleBooking(array(
            'id'     => 0,
            'period' => $period
        ));

        $evaluation = function ($context) {
            if (!$context instanceof BookingContext) {
                return false;
            }

            $booking = $context->getValue();

            return $booking->getId() === 0;
        };

        $subject->setExpression($this->mockExpression($evaluation));

        $this->assertTrue($subject->canBook($booking));
    }

    /**
     * Tests the functionality with a context to ensure that the expression correctly
     * uses the booking context to evaluate to false.
     *
     * @since [*next-version*]
     */
    public function testCanBookWithContextFalse()
    {
        $subject = $this->createInstance();

        $period     = new Period(
            DateTime::parse('Today 10:00'),
            DateTime::parse('Today 11:00')
        );
        $booking    = new SimpleBooking(array(
            'id'     => 21,
            'period' => $period
        ));

        $evaluation = function ($context) {
            if (!$context instanceof BookingContext) {
                return false;
            }

            $booking = $context->getValue();

            return $booking->getId() === 0;
        };

        $subject->setExpression($this->mockExpression($evaluation));

        $this->assertFalse($subject->canBook($booking));
    }
}

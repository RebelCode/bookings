<?php

namespace RebelCode\Bookings\Test\Model\Booking;

use RebelCode\Bookings\Enum\BookingStatus;
use RebelCode\Bookings\Model\Booking\SimpleBooking;
use RebelCode\Diary\DateTime\DateTime;
use RebelCode\Diary\DateTime\Period;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\SimpleBooking}.
 *
 * @since [*next-version*]
 */
class SimpleBookingTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return SimpleBooking
     */
    public function createInstance()
    {
        return new SimpleBooking();
    }

    /**
     * Tests the period getter method.
     *
     * @since [*next-version*]
     */
    public function testGetPeriod()
    {
        $subject = $this->createInstance();

        $period = new Period(DateTime::now(), DateTime::now());
        $subject->setData('period', $period);

        $this->assertTrue($period === $subject->getPeriod());
    }

    /**
     * Tests the status FSM state getter method.
     *
     * @since [*next-version*]
     */
    public function testGetFiniteState()
    {
        $subject = $this->createInstance();

        $status = BookingStatus::DRAFT;
        $subject->setData('status', $status);

        $this->assertEquals(BookingStatus::DRAFT, $subject->getFiniteState());
    }

    /**
     * Tests the status FSM state setter method.
     *
     * @since [*next-version*]
     */
    public function testSetFiniteState()
    {
        $subject = $this->createInstance();

        $subject->setFiniteState(BookingStatus::PAID);

        $this->assertEquals(BookingStatus::PAID, $subject->getData('status'));
    }
}

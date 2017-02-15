<?php

namespace RebelCode\Bookings\Test\Model\Availability\Rule;

use RebelCode\Bookings\Expression\BookingContext;
use RebelCode\Bookings\Model\Availability\Rule\TimeRangeRule;
use RebelCode\Diary\Booking;
use RebelCode\Diary\DateTime\DateTime;
use RebelCode\Diary\DateTime\DateTimeInterface;
use RebelCode\Diary\DateTime\Period;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\Availability\Rule\TimeRangeRule}.
 *
 * @since [*next-version*]
 */
class TimeRangeRuleTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param int $start The time in seconds.
     * @param int $end   The time in seconds.
     *
     * @return TimeRangeRule The created instance.
     */
    public function createInstance($start, $end)
    {
        return new TimeRangeRule(array(
            'start' => $start,
            'end'   => $end,
        ));
    }

    /**
     * Creates a booking instance for testing.
     *
     * @since [*next-version*]
     *
     * @param DateTimeInterface $start The start date time of the booking.
     * @param DateTimeInterface $end   The end date time of the booking.
     *
     * @return Booking The created booking instance.
     */
    public function createBooking(DateTimeInterface $start, DateTimeInterface $end)
    {
        return new Booking(0, new Period($start, $end));
    }

    /**
     * Tests for a booking that obeys the time range.
     *
     * @since [*next-version*]
     */
    public function testBookingInRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 13, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 15, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with a start time equal to the range start time.
     *
     * @since [*next-version*]
     */
    public function testBookingOnRangeStart()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 10, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 15, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with a end time equal to the range end time.
     *
     * @since [*next-version*]
     */
    public function testBookingOnRangeEnd()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 15, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 17, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with start and end times equal to the range start and end times.
     *
     * @since [*next-version*]
     */
    public function testBookingOnRangeStartAndEnd()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 10, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 17, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with a start time smaller than range start value and an end time
     * that lies inside the range.
     *
     * @since [*next-version*]
     */
    public function testBookingStartBeforeRangeEndInRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 8, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 12, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertFalse($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with a start time that lies inside the range and an end time
     * greater than the range end value.
     *
     * @since [*next-version*]
     */
    public function testBookingStartInRangeEndAfterRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 14, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 19, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertFalse($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with both start and end times smaller than the range values.
     *
     * @since [*next-version*]
     */
    public function testBookingStartEndBeforeRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 6, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 9, 30, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertFalse($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with both start and end times larger than the range values.
     *
     * @since [*next-version*]
     */
    public function testBookingStartEndAfterRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 19, 50, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 20, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertFalse($subject->evaluate($ctx));
    }

    /**
     * Tests for a booking with a start time smaller than the range start value and an end
     * time larger than the end range value.
     *
     * @since [*next-version*]
     */
    public function testBookingContainsRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('17:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 6, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 18, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertFalse($subject->evaluate($ctx));
    }

    /**
     * Tests with a range whose start and end values are equal.
     *
     * @since [*next-version*]
     */
    public function testBookingInZeroRange()
    {
        $subject = $this->createInstance(
            strtotime('10:00:00', 0),
            strtotime('10:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 10, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 10, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests with a range that has the start and end values inverted and a booking with both
     * start and end times on the same day.
     *
     * @since [*next-version*]
     */
    public function testBookingInInvertedRange()
    {
        $subject = $this->createInstance(
            strtotime('20:00:00', 0),
            strtotime('04:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 22, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 23, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests with a range that has the start and end values inverted and a booking with the
     * start and end times on the different days.
     *
     * @since [*next-version*]
     */
    public function testBookingInInvertedRange2()
    {
        $subject = $this->createInstance(
            strtotime('22:00:00', 0),
            strtotime('04:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 23, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 16, 02, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests with an inverted range and a booking that starts on the range start value.
     *
     * @since [*next-version*]
     */
    public function testBookingOnInvertedRangeStart()
    {
        $subject = $this->createInstance(
            strtotime('20:00:00', 0),
            strtotime('05:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 20, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 23, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests with an inverted range and a booking that ends on the range end value.
     *
     * @since [*next-version*]
     */
    public function testBookingOnInvertedRangeEnd()
    {
        $subject = $this->createInstance(
            strtotime('20:00:00', 0),
            strtotime('05:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 15, 02, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 05, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }

    /**
     * Tests with an inverted range and a booking with a period that is equal to the range.
     *
     * @since [*next-version*]
     */
    public function testBookingOnInvertedRangeStartAndEnd()
    {
        $subject = $this->createInstance(
            strtotime('20:00:00', 0),
            strtotime('05:00:00', 0)
        );
        $booking = $this->createBooking(
            DateTime::create(2017, 1, 14, 20, 00, 00, 'UTC'),
            DateTime::create(2017, 1, 15, 05, 00, 00, 'UTC')
        );

        $ctx = new BookingContext($booking);

        $this->assertTrue($subject->evaluate($ctx));
    }
}

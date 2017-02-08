<?php

namespace RebelCode\Bookings\FuncTest\Model\Service;

use \RebelCode\Bookings\Model\Service\SimpleSessionService;
use \RebelCode\Diary\DateTime\DateTime;
use \RebelCode\Diary\DateTime\Period;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Model\SimpleSessionService}.
 *
 * @since [*next-version*]
 */
class SimpleSessionServiceTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return SimpleSessionService
     */
    public function createInstance()
    {
        return new SimpleSessionService();
    }

    /**
     * Tests the minimum sessions number getter to ensure that the correct result is given and
     * that the same result is returned regardless of the parameters.
     *
     * @since [*next-version*]
     */
    public function testGetMinSessions()
    {
        $subject = $this->createInstance();

        $subject->setData('min_sessions', 2);

        $p1 = new Period(DateTime::now(), DateTime::now());
        $p2 = new Period(DateTime::parse('Next Friday'), DateTime::parse('Next Saturday'));

        $this->assertEquals(2, $subject->getMinSessions($p1, array('location' => 'Gotham')));
        $this->assertEquals(2, $subject->getMinSessions($p2, array('location' => 'Hell\'s Kitchen')));
    }

    /**
     * Tests the maximum sessions number getter to ensure that the correct result is given and
     * that the same result is returned regardless of the parameters.
     *
     * @since [*next-version*]
     */
    public function testGetMaxSessions()
    {
        $subject = $this->createInstance();

        $subject->setData('max_sessions', 5);

        $p1 = new Period(DateTime::now(), DateTime::now());
        $p2 = new Period(DateTime::parse('Next Friday'), DateTime::parse('Next Saturday'));

        $this->assertEquals(5, $subject->getMaxSessions($p1, array('location' => 'Gotham')));
        $this->assertEquals(5, $subject->getMaxSessions($p2, array('location' => 'Hell\'s Kitchen')));
    }

    /**
     * Tests the maximum sessions number getter to ensure that the correct result is given and
     * that the same result is returned regardless of the parameters.
     *
     * @since [*next-version*]
     */
    public function testGetSessionLength()
    {
        $subject = $this->createInstance();

        $subject->setData('session_length', 1800);

        $p1 = new Period(DateTime::now(), DateTime::now());
        $p2 = new Period(DateTime::parse('Next Friday'), DateTime::parse('Next Saturday'));

        $this->assertEquals(1800, $subject->getSessionLength($p1, array('location' => 'Gotham')));
        $this->assertEquals(1800, $subject->getSessionLength($p2, array('location' => 'Hell\'s Kitchen')));
    }

    /**
     * Tests the session price getter to ensure that the correct result is given and
     * that the same result is returned regardless of the parameters.
     *
     * @since [*next-version*]
     */
    public function testGetSessionPrice()
    {
        $subject = $this->createInstance();

        $subject->setData('session_price', 100);

        $p1 = new Period(DateTime::now(), DateTime::now());
        $p2 = new Period(DateTime::parse('Next Friday'), DateTime::parse('Next Saturday'));

        $this->assertEquals(100, $subject->getSessionPrice($p1, array('location' => 'Gotham')));
        $this->assertEquals(100, $subject->getSessionPrice($p2, array('location' => 'Hell\'s Kitchen')));
    }

    /**
     * Tests the price getter to ensure that the correct result is given and
     * that the same result is returned regardless of the parameters.
     *
     * @since [*next-version*]
     */
    public function testGetPrice()
    {
        $subject = $this->createInstance();

        $subject->setData('session_length', 3600);
        $subject->setData('session_price', 100);

        // 1 session
        $p1 = new Period(DateTime::parse('Today 15:00'), DateTime::parse('Today 16:00'));
        // 3 sessions
        $p2 = new Period(DateTime::parse('Today 15:00'), DateTime::parse('Today 18:00'));

        $this->assertEquals(100, $subject->getPrice($p1, array('location' => 'Gotham')));
        $this->assertEquals(300, $subject->getPrice($p2, array('location' => 'Hell\'s Kitchen')));
    }

    /**
     * Tests the price getter with a non-integer number of sessions to ensure that the
     * fractional session is taken into account when calculating the price.
     *
     * @since [*next-version*]
     */
    public function testGetPriceNoFloor()
    {
        $subject = $this->createInstance();

        $subject->setData('session_length', 3600);
        $subject->setData('session_price', 100);

        // 1.5 sessions
        $period = new Period(DateTime::parse('Today 15:00'), DateTime::parse('Today 16:30'));

        $this->assertEquals(150, $subject->getPrice($period));
    }

    /**
     * Tests the price getter with a non-integer number of sessions and the "floor" arg
     * to ensure that the fractions of a session are ignored when calculating the price.
     *
     * @since [*next-version*]
     */
    public function testGetPriceFloor()
    {
        $subject = $this->createInstance();

        $subject->setData('session_length', 3600);
        $subject->setData('session_price', 100);

        // 1.5 sessions
        $period = new Period(DateTime::parse('Today 15:00'), DateTime::parse('Today 16:30'));

        $this->assertEquals(100, $subject->getPrice($period, array('floor' => true)));
    }
}

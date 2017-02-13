<?php

namespace RebelCode\Bookings\Model\Service;

use RebelCode\Diary\DateTime\PeriodInterface;

/**
 * A service that can be booked in terms of sessions.
 *
 * @since [*next-version*]
 */
interface SessionServiceInterface extends ServiceInterface
{
    /**
     * Gets the price of a single session for a specific period of time.
     *
     * @since [*next-version*]
     *
     * @param PeriodInterface $period The period instance.
     * @param array           $args   An associative array of additional data. Default: array
     *
     * @return float The price of a single session.
     */
    public function getSessionPrice(PeriodInterface $period, array $args = array());

    /**
     * Gets the minimum allowed number of sessions for a specific period of time.
     *
     * @since [*next-version*]
     *
     * @param PeriodInterface $period The period instance.
     * @param array           $args   An associative array of additional data. Default: array
     *
     * @return int The minimum number of sessions.
     */
    public function getMinSessions(PeriodInterface $period, array $args = array());

    /**
     * Gets the maximum allowed number of sessions for a specific period of time.
     *
     * @since [*next-version*]
     *
     * @param PeriodInterface $period The period instance.
     * @param array           $args   An associative array of additional data. Default: array
     *
     * @return int The maximum number of sessions.
     */
    public function getMaxSessions(PeriodInterface $period, array $args = array());

    /**
     * Gets the length of a single session for a specific period of time.
     *
     * @since [*next-version*]
     *
     * @param PeriodInterface $period The period instance.
     * @param array           $args   An associative array of additional data. Default: array
     *
     * @return int The length of a single session in seconds.
     */
    public function getSessionLength(PeriodInterface $period, array $args = array());
}

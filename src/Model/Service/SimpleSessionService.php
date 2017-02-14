<?php

namespace RebelCode\Bookings\Model\Service;

use RebelCode\Bookings\Framework\Model\BaseModel;
use RebelCode\Bookings\Model\Availability\AvailabilityInterface;
use RebelCode\Diary\DateTime\PeriodInterface;

/**
 * A simple implementation of a service that does not have period-specific configuration.
 *
 * The configuration for this service (session length, price, etc.) apply to all sessions,
 * regardless of time period or other parameters such as number of people, location, etc.
 *
 * @since [*next-version*]
 */
class SimpleSessionService extends BaseModel implements SessionServiceInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getMinSessions(PeriodInterface $period = null, array $args = array())
    {
        return $this->getData('min_sessions', 1);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getMaxSessions(PeriodInterface $period = null, array $args = array())
    {
        return $this->getData('max_sessions', 1);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getPrice(PeriodInterface $period = null, array $args = array())
    {
        $duration     = $period->getDuration();
        $numSessions  = $duration / $this->getSessionLength($period, $args);
        $fNumSessions = (isset($args['floor']) && $args['floor'])
            ? floor($numSessions)
            : $numSessions;

        return $fNumSessions * $this->getSessionPrice($period, $args);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getSessionLength(PeriodInterface $period = null, array $args = array())
    {
        return $this->getData('session_length', 3600);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @return AvailabilityInterface
     */
    public function getAvailability()
    {
        return $this->getData('availability');
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getSessionPrice(PeriodInterface $period = null, array $args = array())
    {
        return $this->getData('session_price');
    }
}

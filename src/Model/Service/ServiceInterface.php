<?php

namespace RebelCode\Bookings\Model\Service;

use RebelCode\Bookings\Framework\Model\ModelInterface;
use RebelCode\Bookings\Model\Availability\AvailabilityInterface;
use RebelCode\Diary\DateTime\PeriodInterface;

/**
 * Something that represents a bookable service.
 *
 * @since [*next-version*]
 */
interface ServiceInterface extends ModelInterface
{
    /**
     * Gets the availability for this service.
     *
     * @since [*next-version*]
     *
     * @return AvailabilityInterface The availability instance.
     */
    public function getAvailability();

    /**
     * Gets the price for a specific period of time.
     *
     * @since [*next-version*]
     *
     * @param PeriodInterface $period The period instance.
     * @param array           $args   An associative array of additional data. Default: array
     *
     * @return float The price.
     */
    public function getPrice(PeriodInterface $period, array $args = array());
}

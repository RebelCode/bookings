<?php

namespace RebelCode\Bookings\Model\Booking;

use Finite\StatefulInterface;
use RebelCode\Bookings\Enum\BookingStatus;
use RebelCode\Bookings\Framework\Model\BaseModel;
use RebelCode\Diary\BookingInterface;

/**
 * A simple implementation of a booking model.
 *
 * @method int getServiceId() Gets the ID of the service being provided for this booking.
 * @method int getCustomerId() Gets the ID of the customer associated with this booking.
 * @method int getPaymentId() Gets the IDs of the associated payments.
 * @method BookingStatus getStatus() Gets the booking's current status.
 * @method int getCustomerTzOffset() Gets the customer timezone offset at the time this booking was made.
 *
 * @since [*next-version*]
 */
class SimpleBooking extends BaseModel implements
    BookingInterface,
    StatefulInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getPeriod()
    {
        return $this->getData('period');
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getFiniteState()
    {
        return $this->getData('status');
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function setFiniteState($state)
    {
        $this->setData('status', $state);

        return $this;
    }
}

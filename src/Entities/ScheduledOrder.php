<?php

namespace App\Entities;

use Carbon\Carbon;

class ScheduledOrder
{
    /**
     * The delivery date of this scheduled order.
     *
     * @var \Carbon\Carbon
     */
    protected $deliveryDate;

    /**
     * Is this delivery marked as a holiday that will be skipped.
     *
     * @var bool
     */
    protected $holiday = false;

    /**
     * Is this scheduled order an opt in order that is not part of the normal subscription's plan cycle.
     *
     * @var bool
     */
    protected $optIn = false;

    /**
     * Is this scheduled order part of the subscriptions normal plan cycle.
     *
     * @var bool
     */
    protected $interval = true;

    /**
     * ScheduledOrder constructor.
     *
     * @param  \Carbon\Carbon  $deliveryDate
     * @param  \App\Entities\bool  $isInterval
     */
    public function __construct(Carbon $deliveryDate, bool $isInterval)
    {
        $this->deliveryDate = $deliveryDate;
        $this->interval = $isInterval;
    }

    /**
     * Set interval
     * @param  bool  $interval
     * @return self
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * Set delivery date
     * @param  Carbon  $deliveryDate
     * @return self
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;

    }

    /**
     * Set the opt in's
     * @param  bool  $optIn
     * @return self
     */
    public function setOptIn($optIn)
    {
        return $this->optIn = ($optIn !== $this->interval);
        return $this;
    }

    /**
     * Set the holiday
     * @param  bool  $holiday
     * @return self
     */
    public function setHoliday($holiday)
    {
        $this->holiday = ($holiday === $this->interval);
        return $this;
    }

    /**
     * check the date is opted for delivery or not
     * @return bool
     */
    public function isOptIn()
    {
        return $this->optIn;
    }

    /**
     * Check is holiday or not
     * @return bool
     */
    public function isHoliday()
    {
        return $this->holiday;
    }

    /**
     * Get delivery date
     * @return Carbon
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Check date has interval or not
     * @return bool
     */
    public function isInterval()
    {
        return $this->interval;
    }

}

<?php

namespace App\Entities;

class Subscription
{
    /**
     * The statuses a subscription can have.
     *
     * @var int
     */
    const STATUS_ACTIVE = 1;
    const STATUS_CANCELLED = 2;

    /**
     * The allowed statuses.
     *
     * @var array
     */
    const STATUSES_ALLOWED = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_CANCELLED => 'Cancelled',
    ];

    /**
     * The plans a subscription can have.
     *
     * @var int
     */
    const PLAN_WEEKLY = 1;
    const PLAN_FORTNIGHTLY = 2;

    /**
     * The allowed plans.
     *
     * @var array
     */
    const PLANS_ALLOWED = [
        self::PLAN_WEEKLY => 'Weekly',
        self::PLAN_FORTNIGHTLY => 'Fortnightly',
    ];

    /**
     * The subscription status.
     *
     * @var int
     */
    protected $status;

    /**
     * The subscription plan.
     *
     * @var int
     */
    protected $plan;

    /**
     * The next delivery date for this subscription.
     *
     * @var \Carbon\Carbon|null
     */
    protected $nextDeliveryDate;

    /**
     * Set next delivery date
     * @param  \Carbon\Carbon|null  $nextDeliveryDate
     * @return self
     */
    public function setNextDeliveryDate($nextDeliveryDate)
    {
        $this->nextDeliveryDate = $nextDeliveryDate;
        return $this;
    }

    /**
     * Set subscription plan
     * @param  int  $plan
     * @return self
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * Set Status of subscription
     * @param  int  $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the delivery date
     * @return \Carbon\Carbon|null
     */
    public function getNextDeliveryDate()
    {
        return $this->nextDeliveryDate;
    }

    /**
     * Get the selected plan
     * @return mixed|string
     */
    public function getPlan()
    {
        return self::PLANS_ALLOWED[$this->plan];
    }

    /**
     * Get the Status of subscription
     * @return mixed|string
     */
    public function getStatus()
    {
        return self::STATUSES_ALLOWED[$this->status];
    }
}

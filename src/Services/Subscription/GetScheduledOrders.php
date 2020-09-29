<?php

namespace App\Services\Subscription;

use App\Entities\ScheduledOrder;
use App\Entities\Subscription;
use Carbon\Carbon;

class GetScheduledOrders
{
    /**
     * Handle generating the array of scheduled orders for the given number of weeks and subscription.
     *
     * @param  \App\Entities\Subscription  $subscription
     * @param  int  $forNumberOfWeeks
     *
     * @return array
     */
    public function handle(Subscription $subscription, $forNumberOfWeeks = 6)
    {
        $ordersScheduled = [];
        if ($subscription->getStatus() === Subscription::STATUSES_ALLOWED[Subscription::STATUS_CANCELLED]) {
            return $ordersScheduled;
        }

        $fortnightly = Subscription::PLANS_ALLOWED[Subscription::PLAN_FORTNIGHTLY];
        for ($i = 0; $i < $forNumberOfWeeks; $i++) {
            $upcomingDeliveryDate = (new Carbon($subscription->getNextDeliveryDate()))->startOfDay();
            if ($subscription->getPlan() === $fortnightly) {
                $interval = ($i % 2 == 0);
                $scheduledOrder = new ScheduledOrder(
                    $upcomingDeliveryDate->addWeek($i),
                    $interval
                );
            } else {
                $scheduledOrder = new ScheduledOrder(
                    $upcomingDeliveryDate->addWeek($i),
                    true
                );
            }
            $ordersScheduled[] = $scheduledOrder;
        }

        return $ordersScheduled;
    }
}

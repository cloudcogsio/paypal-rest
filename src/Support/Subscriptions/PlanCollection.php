<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\AbstractCollection;

/**
 * A collection of plans
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-plan_collection
 */
class PlanCollection extends AbstractCollection
{
    protected const PLANS = 'plans';

    /**
     * @return array|null An array of plans
     */
    protected function getPlans(): ?array
    {
        $plans = $this->{self::PLANS};
        if (is_array($plans))
        {
            foreach ($plans as $i => $plan)
            {
                if (is_array($plan))
                    $plans[$i] = new Plan($plan);
            }
            $this->offsetSet(self::PLANS, $plans);
        }
        return $plans;
    }

    protected function setCollection(): AbstractCollection
    {
        if (empty($this->collection))
            $this->collection = $this->getPlans() ?? [];

        return $this;
    }
}

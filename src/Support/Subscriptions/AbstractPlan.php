<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

abstract class AbstractPlan extends JsonSerializableArrayObject
{
    protected const BILLING_CYCLES = 'billing_cycles';
    protected const PAYMENT_PREFERENCES = 'payment_preferences';
    protected const TAXES = 'taxes';

    /**
     * An array of billing cycles for trial billing and regular billing.
     * A plan can have at most two trial cycles and only one regular cycle.
     *
     * @return array|null
     */
    public function getBillingCycles(): ?array
    {
        $billingCycles = $this->{self::BILLING_CYCLES};
        if (is_array($billingCycles))
        {
            foreach ($billingCycles as $i => $billingCycle)
            {
                if (is_array($billingCycle))
                    $billingCycles[$i] = new BillingCycle($billingCycle);
            }

            $this->setBillingCycles($billingCycles);
        }

        return $billingCycles;
    }

    /**
     * An array of billing cycles for trial billing and regular billing.
     * A plan can have at most two trial cycles and only one regular cycle.
     *
     * @param array $billingCycles
     * @return AbstractPlan
     */
    public function setBillingCycles(array $billingCycles): AbstractPlan
    {
        $this->offsetSet(self::BILLING_CYCLES, $billingCycles);
        return $this;
    }
}

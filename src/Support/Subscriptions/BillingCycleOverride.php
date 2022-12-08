<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\PricingScheme;

/**
 * https://developer.paypal.com/docs/api/subscriptions/v1/#definition-billing_cycle_override
 */
class BillingCycleOverride extends JsonSerializableArrayObject
{
    protected const SEQUENCE = 'sequence';
    protected const PRICING_SCHEME = 'pricing_scheme';
    protected const TOTAL_CYCLES = 'total_cycles';

    /**
     * The order in which this cycle is to run among other billing cycles.
     *
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->{self::SEQUENCE};
    }

    /**
     * The order in which this cycle is to run among other billing cycles.
     * For example, a trial billing cycle has a sequence of 1 while a regular billing cycle has a sequence of 2,
     * so that trial cycle runs before the regular cycle.
     *
     * @param int $sequence
     * @return BillingCycle
     */
    public function setSequence(int $sequence): BillingCycleOverride
    {
        $this->offsetSet(self::SEQUENCE, $sequence);
        return $this;
    }

    /**
     * The active pricing scheme for this billing cycle. A free trial billing cycle does not require a pricing scheme.
     *
     * @return PricingScheme
     */
    public function getPricingScheme(): PricingScheme
    {
        $scheme = $this->{self::PRICING_SCHEME};
        if (is_array($scheme))
            $this->setPricingScheme(new PricingScheme($scheme));

        return $this->{self::PRICING_SCHEME};
    }

    /**
     * The active pricing scheme for this billing cycle. A free trial billing cycle does not require a pricing scheme.
     *
     * @param PricingScheme $pricingScheme
     * @return $this
     */
    public function setPricingScheme(PricingScheme $pricingScheme): BillingCycleOverride
    {
        $this->offsetSet(self::PRICING_SCHEME, $pricingScheme);
        return $this;
    }

    /**
     * The number of times this billing cycle gets executed.
     *
     * @return int|null
     */
    public function getTotalCycles(): ?int
    {
        return $this->{self::TOTAL_CYCLES};
    }

    /**
     * The number of times this billing cycle gets executed.
     *
     * Trial billing cycles can only be executed a finite number of times (value between 1 and 999 for total_cycles).
     * Regular billing cycles can be executed infinite times (value of 0 for total_cycles)
     * or a finite number of times (value between 1 and 999 for total_cycles).
     *
     * @param int $cycles
     * @return $this
     */
    public function setTotalCycles(int $cycles): BillingCycleOverride
    {
        $this->offsetSet(self::TOTAL_CYCLES, $cycles);
        return $this;
    }
}

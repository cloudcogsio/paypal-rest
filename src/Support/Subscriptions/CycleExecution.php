<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-cycle_execution
 */
class CycleExecution extends JsonSerializableArrayObject
{
    protected const CYCLES_COMPLETED = 'cycles_completed';
    protected const SEQUENCE = 'sequence';
    protected const TENURE_TYPE = 'tenure_type';
    protected const CURRENT_PRICING_SCHEME_VERSION = 'current_pricing_scheme_version';
    protected const CYCLES_REMAINING = 'cycles_remaining';
    protected const TOTAL_CYCLES = 'total_cycles';

    /**
     * The number of billing cycles that have completed.
     *
     * @return int|null
     */
    public function getCyclesCompleted(): ?int
    {
        return intval($this->{self::CYCLES_COMPLETED});
    }

    /**
     * The order in which to run this cycle among other billing cycles.
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return intval($this->{self::SEQUENCE});
    }

    /**
     * The type of the billing cycle.
     * The possible values are:
     *   REGULAR. A regular billing cycle.
     *   TRIAL. A trial billing cycle.
     *
     * @return string|null
     */
    public function getTenureType(): ?string
    {
        return $this->{self::TENURE_TYPE};
    }

    /**
     * The active pricing scheme version for the billing cycle.
     *
     * @return int|null
     */
    public function getCurrentPricingSchemeVersion(): ?int
    {
        return intval($this->{self::CURRENT_PRICING_SCHEME_VERSION});
    }

    /**
     * For a finite billing cycle, cycles_remaining is the number of remaining cycles.
     * For an infinite billing cycle, cycles_remaining is set as 0.
     *
     * @return int|null
     */
    public function getCyclesRemaining(): ?int
    {
        return intval($this->{self::CYCLES_REMAINING});
    }

    /**
     * The number of times this billing cycle gets executed. Trial billing cycles can only be executed a finite
     * number of times (value between 1 and 999 for total_cycles).
     * Regular billing cycles can be executed infinite times (value of 0 for total_cycles) or a finite number of
     * times (value between 1 and 999 for total_cycles).
     *
     * @return int|null
     */
    public function getTotalCycles(): ?int
    {
        return intval($this->{self::TOTAL_CYCLES});
    }
}

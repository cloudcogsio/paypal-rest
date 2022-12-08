<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Exception\InvalidBillingCycleTenureTypeException;
use Cloudcogs\PayPal\Support\Frequency;
use Cloudcogs\PayPal\Support\PricingScheme;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-billing_cycle
 */
class BillingCycle extends BillingCycleOverride
{
    protected const FREQUENCY = 'frequency';
    protected const TENURE_TYPE = 'tenure_type';

    const TENURE_TYPE_REGULAR = 'REGULAR';
    const TENURE_TYPE_TRIAL = 'TRIAL';

    /**
     * @inheritDoc
     * @param int $sequence
     * @return $this
     */
    public function setSequence(int $sequence): BillingCycle
    {
        parent::setSequence($sequence);
        return $this;
    }

    /**
     * @inheritDoc
     * @param PricingScheme $pricingScheme
     * @return $this
     */
    public function setPricingScheme(PricingScheme $pricingScheme): BillingCycle
    {
        parent::setPricingScheme($pricingScheme);
        return $this;
    }

    /**
     * @inheritDoc
     * @param int $cycles
     * @return $this
     */
    public function setTotalCycles(int $cycles): BillingCycle
    {
        parent::setTotalCycles($cycles);
        return $this;
    }

    /**
     * The frequency details for this billing cycle.
     *
     * @return Frequency|null
     */
    public function getFrequency(): ?Frequency
    {
        if (is_array($this->{self::FREQUENCY}))
            $this->setFrequency(new Frequency($this->{self::FREQUENCY}));

        return $this->{self::FREQUENCY};
    }

    /**
     * The frequency details for this billing cycle.
     *
     * @param Frequency $frequency
     * @return $this
     */
    public function setFrequency(Frequency $frequency): BillingCycle
    {
        $this->offsetSet(self::FREQUENCY, $frequency);
        return $this;
    }

    /**
     * The tenure type of the billing cycle. In case of a plan having trial cycle, only 2 trial cycles are allowed per plan.
     *
     * @return string|null
     */
    public function getTenureType(): ?string
    {
        return $this->{self::TENURE_TYPE};
    }

    /**
     * The tenure type of the billing cycle. In case of a plan having trial cycle, only 2 trial cycles are allowed per plan.
     * The possible values are:
     *  REGULAR. A regular billing cycle.
     *  TRIAL. A trial billing cycle.
     *
     * @param string $tenureType
     * @return $this
     * @throws InvalidBillingCycleTenureTypeException
     */
    public function setTenureType(string $tenureType): BillingCycle
    {
        switch ($tenureType)
        {
            case self::TENURE_TYPE_REGULAR:
            case self::TENURE_TYPE_TRIAL:
                $this->offsetSet(self::TENURE_TYPE, $tenureType);
                return $this;
        }

        throw new InvalidBillingCycleTenureTypeException($tenureType);
    }
}

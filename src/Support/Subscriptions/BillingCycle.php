<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Exception\InvalidBillingCycleTenureTypeException;
use Cloudcogs\PayPal\Support\Frequency;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\PricingScheme;

class BillingCycle extends JsonSerializableArrayObject
{
    protected const FREQUENCY = 'frequency';
    protected const TENURE_TYPE = 'tenure_type';
    protected const SEQUENCE = 'sequence';
    protected const TOTAL_CYCLES = 'total_cycles';
    protected const PRICING_SCHEME = 'pricing_scheme';

    const TENURE_TYPE_REGULAR = 'REGULAR';
    const TENURE_TYPE_TRIAL = 'TRIAL';

    public function getFrequency(): ?Frequency
    {
        if (is_array($this->{self::FREQUENCY}))
            $this->setFrequency(new Frequency($this->{self::FREQUENCY}));

        return $this->{self::FREQUENCY};
    }

    public function setFrequency(Frequency $frequency): BillingCycle
    {
        $this->offsetSet(self::FREQUENCY, $frequency);
        return $this;
    }

    public function getSequence(): ?int
    {
        return $this->{self::SEQUENCE};
    }

    public function setSequence(int $sequence): BillingCycle
    {
        $this->offsetSet(self::SEQUENCE, $sequence);
        return $this;
    }

    public function getTenureType(): ?string
    {
        return $this->{self::TENURE_TYPE};
    }

    /**
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

    public function getPricingScheme(): PricingScheme
    {
        $scheme = $this->{self::PRICING_SCHEME};
        if (is_array($scheme))
            $this->setPricingScheme(new PricingScheme($scheme));

        return $this->{self::PRICING_SCHEME};
    }

    public function setPricingScheme(PricingScheme $pricingScheme): BillingCycle
    {
        $this->offsetSet(self::PRICING_SCHEME, $pricingScheme);
        return $this;
    }

    public function getTotalCycles(): ?int
    {
        return $this->{self::TOTAL_CYCLES};
    }

    public function setTotalCycles(int $cycles): BillingCycle
    {
        $this->offsetSet(self::TOTAL_CYCLES, $cycles);
        return $this;
    }
}

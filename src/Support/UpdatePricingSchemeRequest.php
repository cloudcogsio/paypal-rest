<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-update_pricing_scheme_request
 */
class UpdatePricingSchemeRequest extends JsonSerializableArrayObject
{
    protected const BILLING_CYCLE_SEQUENCE = 'billing_cycle_sequence';
    protected const PRICING_SCHEME = 'pricing_scheme';

    /**
     * The billing cycle sequence.
     *
     * @return int
     */
    public function getBillingCycleSequence(): int
    {
        return $this->{self::BILLING_CYCLE_SEQUENCE};
    }

    /**
     * The billing cycle sequence.
     *
     * @param int $sequence
     * @return $this
     */
    public function setBillingCycleSequence(int $sequence): UpdatePricingSchemeRequest
    {
        $this->offsetSet(self::BILLING_CYCLE_SEQUENCE, $sequence);
        return $this;
    }

    /**
     * The pricing scheme details.
     *
     * @return PricingScheme
     */
    public function getPricingScheme(): PricingScheme
    {
        $data = $this->{self::PRICING_SCHEME};
        if (is_array($data))
            $this->setPricingScheme(new PricingScheme($data));

        return $this->{self::PRICING_SCHEME};
    }

    /**
     * Set the pricing scheme details.
     *
     * @param PricingScheme $pricingScheme
     * @return $this
     */
    public function setPricingScheme(PricingScheme $pricingScheme): UpdatePricingSchemeRequest
    {
        $this->offsetSet(self::PRICING_SCHEME, $pricingScheme);
        return $this;
    }
}

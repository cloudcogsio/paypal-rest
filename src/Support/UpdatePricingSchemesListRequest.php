<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-update_pricing_schemes_list_request
 */
class UpdatePricingSchemesListRequest extends JsonSerializableArrayObject
{
    protected const PRICING_SCHEMES = 'pricing_schemes';

    public function __construct($array = [], $flags = 0, $iteratorClass = "ArrayIterator")
    {
        parent::__construct($array, $flags, $iteratorClass);

        $this->offsetSet(self::PRICING_SCHEMES, []);
    }

    /**
     * An array of pricing schemes.
     *
     * @return array
     */
    public function getPricingSchemes(): array
    {
        return $this->{self::PRICING_SCHEMES};
    }

    /**
     * Add a pricing scheme to the list
     *
     * @param UpdatePricingSchemeRequest $pricingSchemeRequest
     * @return $this
     */
    public function addPricingScheme(UpdatePricingSchemeRequest $pricingSchemeRequest): UpdatePricingSchemesListRequest
    {
        $list = $this->getPricingSchemes();
        $list[] = $pricingSchemeRequest;
        $this->offsetSet(self::PRICING_SCHEMES, $list);

        return $this;
    }
}

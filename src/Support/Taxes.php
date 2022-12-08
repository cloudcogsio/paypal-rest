<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-taxes
 */
class Taxes extends JsonSerializableArrayObject
{
    protected const PERCENTAGE = 'percentage';
    protected const INCLUSIVE = 'inclusive';

    /**
     * The tax percentage on the billing amount.
     *
     * @return string|null
     */
    public function getPercentage(): ?string
    {
        return $this->{self::PERCENTAGE};
    }

    /**
     * The tax percentage on the billing amount.
     *
     * @param string $percentage
     * @return $this
     */
    public function setPercentage(string $percentage): Taxes
    {
        $this->offsetSet(self::PERCENTAGE, $percentage);
        return $this;
    }

    /**
     * Indicates whether the tax was already included in the billing amount.
     *
     * @return string|null
     */
    public function getInclusive(): ?string
    {
        return $this->{self::INCLUSIVE};
    }

    /**
     * Indicates whether the tax was already included in the billing amount.
     *
     * @param bool $inclusive
     * @return $this
     */
    public function setInclusive(bool $inclusive): Taxes
    {
        $this->offsetSet(self::INCLUSIVE, ($inclusive) ? 'true' : 'false');
        return $this;
    }
}

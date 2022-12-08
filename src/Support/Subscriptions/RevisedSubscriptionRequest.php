<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\DateTime;
use Cloudcogs\PayPal\Support\ShippingDetail;

class RevisedSubscriptionRequest extends SubscriptionRequest
{
    protected const EFFECTIVE_TIME = 'effective_time';
    protected const SHIPPING_ADDRESS = 'shipping_address';

    /**
     * The date and time when this change is effective, in Internet date and time format.
     *
     * @param DateTime $time
     * @return $this
     */
    public function setEffectiveTime(DateTime $time): RevisedSubscriptionRequest
    {
        $this->offsetSet(self::EFFECTIVE_TIME, $time->__toString());
        return $this;
    }

    /**
     * The date and time when this change is effective, in Internet date and time format.
     *
     * @return string|null
     */
    public function getEffectiveTime(): ?string
    {
        return $this->{self::EFFECTIVE_TIME};
    }

    /**
     * The shipping address of the subscriber.
     *
     * @param ShippingDetail $shippingDetail
     * @return $this
     */
    public function setShippingAddress(ShippingDetail $shippingDetail): RevisedSubscriptionRequest
    {
        $this->offsetSet(self::SHIPPING_ADDRESS, $shippingDetail);
        return $this;
    }

    /**
     * The shipping address of the subscriber.
     *
     * @return ShippingDetail|null
     */
    public function getShippingAddress(): ?ShippingDetail
    {
        return $this->{self::SHIPPING_ADDRESS};
    }
}

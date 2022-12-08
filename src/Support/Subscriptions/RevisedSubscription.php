<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\LinksHydratorTrait;
use Cloudcogs\PayPal\Support\ShippingDetail;

class RevisedSubscription extends SubscriptionRequest
{
    use LinksHydratorTrait;

    protected const EFFECTIVE_TIME = 'effective_time';
    protected const SHIPPING_ADDRESS = 'shipping_address';
    protected const LINKS = 'links';
    protected const PLAN_OVERRIDDEN = 'plan_overridden';

    public function getPlan(): ?PlanOverride
    {
        $plan = $this->{self::PLAN};
        if (is_array($plan))
        {
            $plan = new PlanOverride($plan);
            $this->offsetSet(self::PLAN, $plan);
        }

        return $plan;
    }

    /**
     * The date and time when this change is effective, in Internet date and time format.
     * Defaults to the current time.
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
     * @return ShippingDetail|null
     */
    public function getShippingAddress(): ?ShippingDetail
    {
        $detail = $this->{self::SHIPPING_ADDRESS};
        if (is_array($detail))
        {
            $detail = new ShippingDetail($detail);
            $this->offsetSet(self::SHIPPING_ADDRESS, $detail);
        }

        return $detail;
    }

    /**
     * An array of request-related HATEOAS links.
     * @return array|null
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $links;
    }

    /**
     * Indicates whether the subscription has overridden any plan attributes.
     *
     * @return bool|null
     */
    public function isPlanOverridden(): ?bool
    {
        return boolval($this->{self::PLAN_OVERRIDDEN}) === true;
    }
}

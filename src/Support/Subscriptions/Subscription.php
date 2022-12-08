<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\LinksHydratorTrait;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-subscription
 */
class Subscription extends AbstractSubscription
{
    use LinksHydratorTrait;

    protected const BILLING_INFO = 'billing_info';
    protected const CREATE_TIME = 'create_time';
    protected const ID = 'id';
    protected const LINKS = 'links';
    protected const PLAN_OVERRIDDEN = 'plan_overridden';
    protected const STATUS = 'status';
    protected const STATUS_CHANGE_NOTE = 'status_change_note';
    protected const STATUS_UPDATE_TIME = 'status_update_time';
    protected const UPDATE_TIME = 'update_time';

    const STATUS_APPROVAL_PENDING = 'APPROVAL_PENDING';
    const STATUS_APPROVED = 'APPROVED';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_SUSPENDED = 'SUSPENDED';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_EXPIRED = 'EXPIRED';

    /**
     * The billing details for the subscription. If the subscription was or is active, these fields are populated.
     *
     * @return SubscriptionBillingInfo|null
     */
    public function getBillingInfo(): ?SubscriptionBillingInfo
    {
        $info = $this->{self::BILLING_INFO};
        if (is_array($info))
            $this->offsetSet(self::BILLING_INFO, new SubscriptionBillingInfo($info));

        return $this->{self::BILLING_INFO};
    }

    /**
     * The date and time, in Internet date and time format. Seconds are required.
     *
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->{self::CREATE_TIME};
    }

    /**
     * The PayPal-generated ID for the subscription.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->{self::ID};
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
     * Inline plan details.
     *
     * @return Plan|null
     */
    public function getPlan(): ?Plan
    {
        $plan = $this->{self::PLAN};

        if (is_array($plan))
        {
            $plan = new Plan($plan);
            $this->offsetSet(self::PLAN, $plan);
        }

        return $plan;
    }

    /**
     * Inline plan details.
     *
     * @param Plan $plan
     * @return Subscription
     */
    public function setPlan(Plan $plan): Subscription
    {
        $this->offsetSet(self::PLAN, $plan);
        return $this;
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

    /**
     * The status of the subscription.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    /**
     * The reason or notes for the status of the subscription.
     * @return string|null
     */
    public function getStatusChangeNote(): ?string
    {
        return $this->{self::STATUS_CHANGE_NOTE};
    }

    /**
     * @return string|null
     */
    public function getStatusUpdateTime(): ?string
    {
        return $this->{self::STATUS_UPDATE_TIME};
    }

    /**
     * The subscriber response information.
     *
     * @return Subscriber|null
     */
    public function getSubscriber(): ?Subscriber
    {
        $subscriber = $this->{self::SUBSCRIBER};
        if (is_array($subscriber))
        {
            $subscriber = new Subscriber($subscriber);
            $this->offsetSet(self::SUBSCRIBER, $subscriber);
        }

        return $subscriber;
    }

    /**
     * @param Subscriber $subscriber
     * @return Subscription
     */
    public function setSubscriber(Subscriber $subscriber): Subscription
    {
        $this->offsetSet(self::SUBSCRIBER, $subscriber);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->{self::UPDATE_TIME};
    }
}

<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\ApplicationContext;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-subscription_request
 */
class SubscriptionRequest extends AbstractSubscription
{
    protected const APPLICATION_CONTEXT = 'application_context';

    /**
     * @return ApplicationContext|null The application context, which customizes the payer experience during the subscription approval process with PayPal.
     */
    public function getApplicationContext(): ?ApplicationContext
    {
        $applicationContext = $this->{self::APPLICATION_CONTEXT};
        if (is_array($applicationContext))
        {
            $applicationContext = new ApplicationContext($applicationContext);
            $this->setApplicationContext($applicationContext);
        }

        return $applicationContext;
    }

    /**
     * The application context, which customizes the payer experience during the subscription approval process with PayPal.
     *
     * @param ApplicationContext $applicationContext
     * @return $this
     */
    public function setApplicationContext(ApplicationContext $applicationContext): SubscriptionRequest
    {
        $this->offsetSet(self::APPLICATION_CONTEXT, $applicationContext);
        return $this;
    }

    /**
     * An inline plan object to customise the subscription.
     * You can override plan level default attributes by providing customised values for the subscription in this object.
     *
     * @return PlanOverride|null
     */
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
     * An inline plan object to customise the subscription.
     * You can override plan level default attributes by providing customised values for the subscription in this object.
     *
     * @param PlanOverride $plan
     * @return SubscriptionRequest
     */
    public function setPlan(PlanOverride $plan): SubscriptionRequest
    {
        $this->offsetSet(self::PLAN, $plan);
        return $this;
    }

    /**
     * The subscriber response information.
     *
     * @return SubscriberRequest|null
     */
    public function getSubscriber(): ?SubscriberRequest
    {
        $subscriber = $this->{self::SUBSCRIBER};
        if (is_array($subscriber))
        {
            $subscriber = new SubscriberRequest($subscriber);
            $this->setSubscriber($subscriber);
        }

        return $subscriber;
    }

    /**
     * @param SubscriberRequest $subscriber
     * @return $this
     */
    public function setSubscriber(SubscriberRequest $subscriber): SubscriptionRequest
    {
        $this->offsetSet(self::SUBSCRIBER, $subscriber);
        return $this;
    }
}

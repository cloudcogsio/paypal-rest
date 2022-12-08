<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\RevisedSubscription;

class RevisePlanOrQuantityOfSubscriptionResponse extends AbstractResponse
{
    protected RevisedSubscription $subscription;

    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @return RevisedSubscription
     */
    public function getRevisedSubscription(): RevisedSubscription
    {
        return $this->subscription ?? $this->subscription = new RevisedSubscription($this->getData());
    }
}

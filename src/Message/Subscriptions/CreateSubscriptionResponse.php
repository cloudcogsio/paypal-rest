<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\Subscription;

class CreateSubscriptionResponse extends AbstractResponse
{
    protected Subscription $subscription;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 201;
    }

    /**
     * @return Subscription|null
     * @throws UnsuccessfulResponseException
     */
    public function getCreatedSubscription(): ?Subscription
    {
        if ($this->isSuccessful())
            return $this->subscription ?? $this->subscription = new Subscription($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\Subscription;

/**
 * ShowSubscriptionDetails response handler
 */
class ShowSubscriptionDetailsResponse extends AbstractResponse
{
    protected Subscription $subscription;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @return Subscription
     * @throws UnsuccessfulResponseException
     */
    public function getSubscription(): Subscription
    {
        if ($this->isSuccessful())
            return $this->subscription ?? $this->subscription = new Subscription($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

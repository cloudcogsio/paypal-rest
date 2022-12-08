<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractResponse;

/**
 * ActivateSubscription response handler
 */
class ActivateSubscriptionResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return $this->getHttpResponse()->getStatusCode() == 204;
    }
}

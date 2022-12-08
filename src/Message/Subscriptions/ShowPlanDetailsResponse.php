<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\Plan;

/**
 * ShowPlanDetails response handler
 */
class ShowPlanDetailsResponse extends AbstractResponse
{
    protected Plan $plan;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * The retrieved Plan
     *
     * @return Plan
     * @throws UnsuccessfulResponseException
     */
    public function getPlan(): Plan
    {
        if ($this->isSuccessful())
            return $this->plan ?? $this->plan = new Plan($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

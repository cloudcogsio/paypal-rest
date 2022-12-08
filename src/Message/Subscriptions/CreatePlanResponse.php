<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\Plan;

/**
 * CreatePlan response handler
 */
class CreatePlanResponse extends AbstractResponse
{
    protected Plan $createdPlan;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return ($this->getHttpResponse()->getStatusCode() == 201 || $this->getHttpResponse()->getStatusCode() == 200);
    }

    /**
     * The created Plan
     *
     * @return Plan|null
     * @throws UnsuccessfulResponseException
     */
    public function getCreatedPlan(): ?Plan
    {
        if ($this->isSuccessful())
            return $this->createdPlan ?? $this->createdPlan = new Plan($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

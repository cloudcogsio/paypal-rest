<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\PlanCollection;

/**
 * List plans response handler
 */
class ListPlansResponse extends AbstractResponse
{
    protected PlanCollection $planCollection;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * The collection/list of plans
     *
     * @return PlanCollection
     * @throws UnsuccessfulResponseException
     */
    public function getPlanList(): PlanCollection
    {
        if ($this->isSuccessful())
            return $this->planCollection ?? $this->planCollection = new PlanCollection($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

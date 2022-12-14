<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\Plan;

/**
 * DeactivatePlan response handler
 */
class DeactivatePlanResponse extends AbstractResponse
{
    protected Plan $plan;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 204;
    }

    /**
     * Retrieve the deactivated plan
     *
     * @return Plan
     * @throws UnsuccessfulResponseException
     */
    public function getPlan(): Plan
    {
        if ($this->isSuccessful())
            return $this->plan ?? $this->plan = $this->getPlanDetails();

        throw new UnsuccessfulResponseException();
    }

    protected function getPlanDetails(): Plan
    {
        /** @var $originalRequest DeactivatePlan */
        $originalRequest = $this->getRequest();

        $PlanDetailsRequest = $originalRequest->getGateway()->ShowPlanDetails($originalRequest->getPlanId());
        $PlanDetailsRequest->setGateway($originalRequest->getGateway());

        /** @var $PlanDetailsResponse ShowPlanDetailsResponse */
        $PlanDetailsResponse = $PlanDetailsRequest->send();

        if ($PlanDetailsResponse->isSuccessful())
            return $PlanDetailsResponse->getPlan();

        throw new UnsuccessfulResponseException();
    }
}

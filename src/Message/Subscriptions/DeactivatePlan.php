<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Deactivates a plan, by ID.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_deactivate
 */
class DeactivatePlan extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans/{plan_id}/deactivate';

    protected const PLAN_ID = 'plan_id';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new DeactivatePlanResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace("{plan_id}", $this->getPlanId(), self::ENDPOINT);
    }

    public function setPlanId(string $planId): DeactivatePlan
    {
        return $this->setParameter(self::PLAN_ID, $planId);
    }

    public function getPlanId(): string
    {
        return $this->getParameter(self::PLAN_ID);
    }

    /**
     * @return null
     * @throws AccessTokenNotFoundException
     */
    public function getData(): null
    {
        $this->includeAuthorization();
        return null;
    }
}

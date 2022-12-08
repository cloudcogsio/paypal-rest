<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Activates a plan, by ID.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_activate
 */
class ActivatePlan extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans/{plan_id}/activate';

    protected const PLAN_ID = 'plan_id';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ActivatePlanResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace("{plan_id}", $this->getPlanId(), self::ENDPOINT);
    }

    public function setPlanId(string $planId): ActivatePlan
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
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }
}

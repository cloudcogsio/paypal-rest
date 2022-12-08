<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Shows details for a plan, by ID.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_get
 */
class ShowPlanDetails extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans/';

    protected const PLAN_ID = 'plan_id';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ShowPlanDetailsResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.$this->getPlanId();
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function setPlanId(string $planId): ShowPlanDetails
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

<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\UpdatePricingSchemesListRequest;
use Psr\Http\Message\ResponseInterface;

/**
 * Updates pricing for a plan. For example, you can update a regular billing cycle from $5 per month to $7 per month.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_update-pricing-schemes
 */
class UpdatePricing extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans/{plan_id}/update-pricing-schemes';

    protected const PLAN_ID = 'plan_id';
    protected const PRICING_SCHEMES = 'pricing_schemes';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new UpdatePricingResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace("{plan_id}", $this->getPlanId(), self::ENDPOINT);
    }

    public function setPlanId(string $planId): UpdatePricing
    {
        return $this->setParameter(self::PLAN_ID, $planId);
    }

    public function getPlanId(): string
    {
        return $this->getParameter(self::PLAN_ID);
    }

    public function setUpdatePricingSchemesListRequest(UpdatePricingSchemesListRequest $updatePricingSchemesListRequest): UpdatePricing
    {
        return $this->setParameter(self::PRICING_SCHEMES, $updatePricingSchemesListRequest);
    }

    public function getUpdatePricingSchemesListRequest(): UpdatePricingSchemesListRequest
    {
        return $this->getParameter(self::PRICING_SCHEMES);
    }

    /**
     * @return string
     * @throws AccessTokenNotFoundException
     * @throws \JsonException
     */
    public function getData(): string
    {
        $this->includeAuthorization();
        return (new JsonSerializableArrayObject())->toJsonString($this->getUpdatePricingSchemesListRequest());
    }
}

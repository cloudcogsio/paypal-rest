<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Constants;
use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPreferRepresentationException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\PlanRequest;
use Omnipay\Common\Http\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Creates a plan that defines pricing and billing cycle details for subscriptions.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_create
 */
class CreatePlan extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans';

    protected PlanRequest $plan;

    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->plan = new PlanRequest();
    }

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new CreatePlanResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * Set a plan to be created or configure the default plan instance created when this class was instantiated.
     * Eg.
     * $plan = new PlanRequest([...]);
     * $Gateway->CreatePlan($plan);
     *
     * OR
     *
     * $Gateway->CreatePlan()->setName('Test Plan');
     *
     * @param PlanRequest|null $plan
     * @return PlanRequest
     */
    public function Plan(?PlanRequest $plan = null): PlanRequest
    {
        if ($plan != null)
            $this->plan = $plan;

        return $this->plan;
    }

    /**
     * @return string
     * @throws AccessTokenNotFoundException
     * @throws InvalidPreferRepresentationException
     * @throws \JsonException
     */
    public function getData(): string
    {
        $this->setPreferRepresentation(Constants::PAYPAL_PREFER_REPRESENTATION_DETAILED);
        $this->includeAuthorization();
        return $this->plan->toJsonString();
    }
}

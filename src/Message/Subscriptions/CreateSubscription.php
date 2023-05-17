<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\SubscriptionRequest;
use Omnipay\Common\Http\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class CreateSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions';

    protected SubscriptionRequest $subscription;

    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->subscription = new SubscriptionRequest();
    }

    /**
     * @param ResponseInterface $response
     * @return AbstractResponse
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new CreateSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @return string
     * @throws \JsonException
     * @throws AccessTokenNotFoundException
     */
    public function getData(): string
    {
        $this->includeAuthorization();
        return $this->subscription->toJsonString();
    }

    /**
     * Set a Subscription object or proxy to/customize the default SubscriptionRequest instance created by the constructor.
     *
     * @param SubscriptionRequest|null $subscription
     * @return SubscriptionRequest
     */
    public function SubscriptionRequest(?SubscriptionRequest $subscription = null): SubscriptionRequest
    {
        if (!is_null($subscription))
            $this->subscription = $subscription;

        return $this->subscription;
    }
}

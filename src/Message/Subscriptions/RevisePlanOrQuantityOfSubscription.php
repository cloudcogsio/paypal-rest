<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Subscriptions\RevisedSubscriptionRequest;
use Psr\Http\Message\ResponseInterface;

/**
 * Updates the quantity of the product or service in a subscription.
 * You can also use this method to switch the plan and update the shipping_amount, shipping_address values for the subscription.
 * This type of update requires the buyer's consent.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_revise
 */
class RevisePlanOrQuantityOfSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}/revise';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const REVISED_SUBSCRIPTION_REQUEST = 'revised_subscription_request';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new RevisePlanOrQuantityOfSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace('{id}', $this->getSubscriptionId(), self::ENDPOINT);
    }

    public function setSubscriptionId(string $subscriptionId): RevisePlanOrQuantityOfSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    public function setRevisedSubscriptionRequest(RevisedSubscriptionRequest $revisedSubscriptionRequest): RevisePlanOrQuantityOfSubscription
    {
        return $this->setParameter(self::REVISED_SUBSCRIPTION_REQUEST, $revisedSubscriptionRequest);
    }

    public function getRevisedSubscriptionRequest(): RevisedSubscriptionRequest
    {
        return $this->getParameter(self::REVISED_SUBSCRIPTION_REQUEST);
    }

    /**
     * @return string
     * @throws \Cloudcogs\PayPal\Exception\AccessTokenNotFoundException
     * @throws \JsonException
     */
    public function getData(): string
    {
        //$this->includeAuthorization();
        return $this->getRevisedSubscriptionRequest()->toJsonString();
    }
}

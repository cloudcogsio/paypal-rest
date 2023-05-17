<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Psr\Http\Message\ResponseInterface;

/**
 * Activates the subscription.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_activate
 */
class ActivateSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}/activate';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const REASON = 'reason';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ActivateSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace('{id}', $this->getSubscriptionId(), self::ENDPOINT);
    }

    public function setSubscriptionId(string $subscriptionId): ActivateSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    public function setReason(string $reason): ActivateSubscription
    {
        return $this->setParameter(self::REASON, $reason);
    }

    public function getReason(): ?string
    {
        return $this->getParameter(self::REASON);
    }

    /**
     * @return string
     * @throws \JsonException
     * @throws AccessTokenNotFoundException
     */
    public function getData(): string
    {
        $this->includeAuthorization();

        return (new JsonSerializableArrayObject(['reason' => $this->getReason()]))->toJsonString();
    }
}

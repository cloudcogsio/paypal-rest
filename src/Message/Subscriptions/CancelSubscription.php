<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Psr\Http\Message\ResponseInterface;

/**
 * Cancels the subscription.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_cancel
 */
class CancelSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}/cancel';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const REASON = 'reason';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new CancelSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace('{id}', $this->getSubscriptionId(), self::ENDPOINT);
    }

    public function setSubscriptionId(string $subscriptionId): CancelSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    public function setReason(string $reason): CancelSubscription
    {
        return $this->setParameter(self::REASON, $reason);
    }

    public function getReason(): ?string
    {
        return $this->getParameter(self::REASON);
    }

    /**
     * @return string
     * @throws AccessTokenNotFoundException
     * @throws \JsonException
     */
    public function getData(): string
    {
        $this->includeAuthorization();

        return (new JsonSerializableArrayObject(['reason' => $this->getReason()]))->toJsonString();
    }
}

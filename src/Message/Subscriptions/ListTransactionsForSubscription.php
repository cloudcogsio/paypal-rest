<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\DateTime;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lists transactions for a subscription.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_transactions
 */
class ListTransactionsForSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}/transactions';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const START_TIME = 'start_time';
    protected const END_TIME = 'end_time';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ListTransactionsForSubscriptionResponse($this, $response);
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function getEndpoint(): string
    {
        $params = '?'.http_build_query([
                self::START_TIME => $this->getStartTime(),
                self::END_TIME => $this->getEndTime()
            ]);

        return str_replace('{id}', $this->getSubscriptionId(), self::ENDPOINT).$params;
    }

    public function setSubscriptionId(string $subscriptionId): ListTransactionsForSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    public function setStartTime(DateTime $dateTime): ListTransactionsForSubscription
    {
        return $this->setParameter(self::START_TIME, $dateTime->__toString());
    }

    public function getStartTime(): string
    {
        return $this->getParameter(self::START_TIME);
    }

    public function setEndTime(DateTime $dateTime): ListTransactionsForSubscription
    {
        return $this->setParameter(self::END_TIME, $dateTime->__toString());
    }

    public function getEndTime(): string
    {
        return $this->getParameter(self::END_TIME);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }
}
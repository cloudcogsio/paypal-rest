<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Shows details for a subscription, by ID.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_get
 */
class ShowSubscriptionDetails extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const FIELDS = 'fields';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ShowSubscriptionDetailsResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        $fields = $this->getFields();
        if (!is_null($fields)) $fields = '?'.http_build_query(['fields'=>$fields]);
        return str_replace("{id}", $this->getSubscriptionId(), self::ENDPOINT).$fields;
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function setSubscriptionId(string $id): ShowSubscriptionDetails
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $id);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    /**
     * List of fields that are to be returned in the response.
     * Possible value for fields are last_failed_payment and plan.
     *
     * @param string $fields
     * @return ShowSubscriptionDetails
     */
    public function setFields(string $fields): ShowSubscriptionDetails
    {
        return $this->setParameter(self::FIELDS, $fields);
    }

    public function getFields(): ?string
    {
        return $this->getParameter(self::FIELDS);
    }

    /**
     * @inheritDoc
     * @throws AccessTokenNotFoundException
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }
}

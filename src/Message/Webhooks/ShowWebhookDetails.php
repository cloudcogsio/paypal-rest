<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Shows details for a webhook, by ID.
 *
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_get
 */
class ShowWebhookDetails extends AbstractRequest
{
    const ENDPOINT = '/v1/notifications/webhooks/{webhook_id}';
    protected const WEBHOOK_ID = 'webhook_id';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ShowWebhookDetailsResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace('{webhook_id}', $this->getWebhookId(), self::ENDPOINT);
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function setWebhookId(string $webhook_id): ShowWebhookDetails
    {
        return $this->setParameter(self::WEBHOOK_ID, $webhook_id);
    }

    public function getWebhookId(): string
    {
        return $this->getParameter(self::WEBHOOK_ID);
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

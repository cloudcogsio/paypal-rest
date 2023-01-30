<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Webhooks\WebhookList;

class ListWebhooksResponse extends AbstractResponse
{
    protected WebhookList $webhookList;
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @return WebhookList
     * @throws UnsuccessfulResponseException
     */
    public function getWebhookList(): WebhookList
    {
        if ($this->isSuccessful())
            return $this->webhookList ?? $this->webhookList = new WebhookList($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

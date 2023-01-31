<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\Webhooks\Webhook;

class ShowWebhookDetailsResponse extends AbstractResponse
{
    protected Webhook $webhook;
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @throws UnsuccessfulResponseException
     */
    public function getWebhook(): Webhook
    {
        if ($this->isSuccessful())
        {
            return $this->webhook ?? $this->webhook = new Webhook($this->getData());
        }

        throw new UnsuccessfulResponseException();
    }
}

<?php

namespace Cloudcogs\PayPal;

use Cloudcogs\PayPal\Message\Webhooks\ListWebhooks;
use Cloudcogs\PayPal\Message\Webhooks\ShowWebhookDetails;
use Cloudcogs\PayPal\Message\Webhooks\VerifyWebhookSignature;
use Cloudcogs\PayPal\Support\Webhooks\VerifyWebhookSignature as VerifyWebhookSignatureRequest;

class Webhooks extends RestGateway
{
    /******************** WEBHOOKS *******************/

    /**
     * Lists webhooks for an app.
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_list
     * @param array $parameters
     * @return ListWebhooks
     */
    public function ListWebhooks(array $parameters = []): ListWebhooks
    {
        /** @var ListWebhooks $request */
        $request = $this->createRequest(ListWebhooks::class, $parameters);

        return $request->setGateway($this);
    }

    /**
     * Shows details for a webhook, by ID.
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_get
     * @param string $webhookId
     * @return ShowWebhookDetails
     */
    public function ShowWebhookDetails(string $webhookId): ShowWebhookDetails
    {
        /** @var ShowWebhookDetails $request */
        $request = $this->createRequest(ShowWebhookDetails::class, []);
        $request->setWebhookId($webhookId);

        return $request->setGateway($this);
    }
}

<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Message\AbstractResponse;
use \Cloudcogs\PayPal\Support\Webhooks\VerifyWebhookSignatureResponse as PaypalVerifyWebhookSignatureResponse;

class VerifyWebhookSignatureResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    public function getVerificationStatus(): bool
    {
        return (new PaypalVerifyWebhookSignatureResponse($this->getData()))->getVerificationStatus();
    }
}

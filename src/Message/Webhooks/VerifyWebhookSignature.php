<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use \Cloudcogs\PayPal\Support\Webhooks\VerifyWebhookSignature as VerifyWebhookSignatureRequest;
/**
 * Verifies a webhook signature.
 *
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#verify-webhook-signature_post
 */
class VerifyWebhookSignature extends AbstractRequest
{
    const ENDPOINT = '/v1/notifications/verify-webhook-signature';
    protected const WEBHOOK_SIGNATURE_REQUEST = 'verifyWebhookSignatureRequest';
    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new VerifyWebhookSignatureResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @param VerifyWebhookSignatureRequest $verifyWebhookSignatureRequest
     * @return VerifyWebhookSignature
     */
    public function setVerifyWebhookSignatureRequest(VerifyWebhookSignatureRequest $verifyWebhookSignatureRequest): VerifyWebhookSignature
    {
        return $this->setParameter(self::WEBHOOK_SIGNATURE_REQUEST, $verifyWebhookSignatureRequest);
    }

    /**
     * @return VerifyWebhookSignatureRequest
     */
    public function getVerifyWebhookSignatureRequest(): VerifyWebhookSignatureRequest
    {
        return $this->getParameter(self::WEBHOOK_SIGNATURE_REQUEST);
    }

    /**
     * @inheritDoc
     * @throws AccessTokenNotFoundException
     * @throws \JsonException
     */
    public function getData()
    {
        $this->includeAuthorization();
        return $this->getVerifyWebhookSignatureRequest()->toJsonString();
    }
}

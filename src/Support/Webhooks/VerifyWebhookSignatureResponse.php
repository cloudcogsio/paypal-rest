<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

/**
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-verify_webhook_signature_response
 */
class VerifyWebhookSignatureResponse extends JsonSerializableArrayObject
{
    protected const VERIFICATION_STATUS = 'verification_status';

    /**
     * The status of the signature verification.
     *
     * @return bool
     */
    public function getVerificationStatus(): bool
    {
        return $this->{self::VERIFICATION_STATUS} == 'SUCCESS';
    }
}

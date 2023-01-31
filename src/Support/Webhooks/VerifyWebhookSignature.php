<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

/**
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-verify_webhook_signature
 */
class VerifyWebhookSignature extends JsonSerializableArrayObject
{
    protected const AUTH_ALGO = 'auth_algo';
    protected const CERT_URL = 'cert_url';
    protected const TRANSMISSION_ID = 'transmission_id';
    protected const TRANSMISSION_SIG = 'transmission_sig';
    protected const TRANSMISSION_TIME = 'transmission_time';
    protected const WEBHOOK_ID = 'webhook_id';
    protected const WEBHOOK_EVENT = 'webhook_event';

    /**
     * The algorithm that PayPal uses to generate the signature and that you can use to verify the signature.
     * Extract this value from the PAYPAL-AUTH-ALGO response header, which is received with the webhook notification.
     *
     * @return string
     */
    public function getAuthAlgo(): string
    {
        return $this->{self::AUTH_ALGO};
    }

    public function setAuthAlgo(string $auth_algo): VerifyWebhookSignature
    {
        $this->offsetSet(self::AUTH_ALGO, $auth_algo);
        return $this;
    }

    /**
     * The X.509 public key certificate. Download the certificate from this URL and use it to verify the signature.
     * Extract this value from the PAYPAL-CERT-URL response header, which is received with the webhook notification.
     *
     * @return string
     */
    public function getCertUrl(): string
    {
        return $this->{self::CERT_URL};
    }

    public function setCertUrl(string $cert_url): VerifyWebhookSignature
    {
        $this->offsetSet(self::CERT_URL, $cert_url);
        return $this;
    }

    /**
     * The ID of the HTTP transmission. Contained in the PAYPAL-TRANSMISSION-ID header of the notification message.
     *
     * @return string
     */
    public function getTransmissionId(): string
    {
        return $this->{self::TRANSMISSION_ID};
    }

    public function setTransmissionId(string $transmission_id): VerifyWebhookSignature
    {
        $this->offsetSet(self::TRANSMISSION_ID, $transmission_id);
        return $this;
    }

    /**
     * The PayPal-generated asymmetric signature. Appears in the PAYPAL-TRANSMISSION-SIG header of the notification message.
     *
     * @return string
     */
    public function getTransmissionSig(): string
    {
        return $this->{self::TRANSMISSION_SIG};
    }

    public function setTransmissionSig(string $transmission_sig): VerifyWebhookSignature
    {
        $this->offsetSet(self::TRANSMISSION_SIG, $transmission_sig);
        return $this;
    }

    /**
     * The date and time of the HTTP transmission, in Internet date and time format.
     * Appears in the PAYPAL-TRANSMISSION-TIME header of the notification message.
     *
     * @return string
     */
    public function getTransmissionTime(): string
    {
        return $this->{self::TRANSMISSION_TIME};
    }

    public function setTransmissionTime(string $transmission_time): VerifyWebhookSignature
    {
        $this->offsetSet(self::TRANSMISSION_TIME, $transmission_time);
        return $this;
    }

    /**
     * The ID of the webhook as configured in your Developer Portal account.
     *
     * @return string
     */
    public function getWebhookId(): string
    {
        return $this->{self::WEBHOOK_ID};
    }

    public function setWebhookId(string $webhook_id): VerifyWebhookSignature
    {
        $this->offsetSet(self::WEBHOOK_ID, $webhook_id);
        return $this;
    }

    /**
     * A webhook event notification.
     *
     * @return Event
     */
    public function getWebhookEvent(): Event
    {
        $event = $this->{self::WEBHOOK_EVENT};
        if (is_array($event))
        {
            $event = new Event($event);
            $this->setEvent($event);
        }

        return $event;
    }

    public function setEvent(Event $event): VerifyWebhookSignature
    {
        $this->offsetSet(self::WEBHOOK_EVENT, $event);
        return $this;
    }
}


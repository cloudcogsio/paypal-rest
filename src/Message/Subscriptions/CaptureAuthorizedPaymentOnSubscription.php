<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Money;
use Psr\Http\Message\ResponseInterface;

/**
 * Captures an authorized payment from the subscriber on the subscription.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_capture
 */
class CaptureAuthorizedPaymentOnSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/{id}/capture';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const AMOUNT = 'amount';
    protected const CAPTURE_TYPE = 'capture_type';
    protected const NOTE = 'note';

    /**
     * The outstanding balance that the subscriber must clear.
     */
    const CAPTURE_TYPE_OUTSTANDING_BALANCE = 'OUTSTANDING_BALANCE';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new CaptureAuthorizedPaymentOnSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return str_replace('{id}', $this->getSubscriptionId(), self::ENDPOINT);
    }

    public function setSubscriptionId(string $subscriptionId): CaptureAuthorizedPaymentOnSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    /**
     * The amount of the outstanding balance.
     * This value cannot be greater than the current outstanding balance amount.
     *
     * @param Money $amount
     * @return CaptureAuthorizedPaymentOnSubscription
     */
    public function setCaptureAmount(Money $amount): CaptureAuthorizedPaymentOnSubscription
    {
        return $this->setParameter(self::AMOUNT, $amount);
    }

    public function getCaptureAmount(): Money
    {
        return $this->getParameter(self::AMOUNT);
    }

    /**
     * The type of capture.
     *    The possible values are:
     *    OUTSTANDING_BALANCE. The outstanding balance that the subscriber must clear.
     *
     * @param string $type
     * @return CaptureAuthorizedPaymentOnSubscription
     * @throws ValueOutOfBoundsException
     */
    public function setCaptureType(string $type = self::CAPTURE_TYPE_OUTSTANDING_BALANCE): CaptureAuthorizedPaymentOnSubscription
    {
        if ($type != self::CAPTURE_TYPE_OUTSTANDING_BALANCE)
            throw new ValueOutOfBoundsException($type);

        return $this->setParameter(self::CAPTURE_TYPE, $type);
    }

    public function getCaptureType(): string
    {
        return $this->getParameter(self::CAPTURE_TYPE);
    }

    /**
     * The reason or note for the subscription charge.
     *
     * @param string $note
     * @return CaptureAuthorizedPaymentOnSubscription
     * @throws ValueOutOfBoundsException
     */
    public function setNote(string $note): CaptureAuthorizedPaymentOnSubscription
    {
        $length = strlen($note);
        if ($length < 1 || $length > 128)
            throw new ValueOutOfBoundsException($note);

        return $this->setParameter(self::NOTE, $note);
    }

    public function getNote(): string
    {
        return $this->getParameter(self::NOTE);
    }

    /**
     * @return string
     * @throws AccessTokenNotFoundException
     * @throws \JsonException
     */
    public function getData()
    {
        $this->includeAuthorization();

        return (new JsonSerializableArrayObject())->toJsonString([
            self::AMOUNT => $this->getCaptureAmount(),
            self::CAPTURE_TYPE => $this->getCaptureType(),
            self::NOTE => $this->getNote()
        ]);
    }
}

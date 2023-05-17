<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\AmountWithBreakdown;

/**
 * CaptureAuthorizedPaymentOnSubscription response handler
 */
class CaptureAuthorizedPaymentOnSubscriptionResponse extends AbstractResponse
{
    protected const AMOUNT_WITH_BREAKDOWN = 'amount_with_breakdown';
    protected const TRANSACTION_ID= 'id';
    protected const PAYER_EMAIL = 'payer_email';
    protected const PAYER_NAME = 'payer_name';
    protected const STATUS = 'status';
    protected const TIME = 'time';

    /**
     * The funds for this captured payment were credited to the payee's PayPal account.
     */
    const STATUS_COMPLETED = 'COMPLETED';

    /**
     * The funds could not be captured.
     */
    const STATUS_DECLINED = 'DECLINED';

    /**
     * An amount less than this captured payment's amount was partially refunded to the payer.
     */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /**
     * The funds for this captured payment was not yet credited to the payee's PayPal account
     */
    const STATUS_PENDING = 'PENDING';

    /**
     * An amount greater than or equal to this captured payment's amount was refunded to the payer.
     */
    const STATUS_REFUNDED = 'REFUNDED';

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 202;
    }

    /**
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     *
     * @return AmountWithBreakdown|null
     */
    public function getAmountWithBreakdown(): ?AmountWithBreakdown
    {
        $amount = @$this->getData()[self::AMOUNT_WITH_BREAKDOWN];
        if (is_array($amount))
        {
            $amount = new AmountWithBreakdown($amount);
            $this->data[self::AMOUNT_WITH_BREAKDOWN] = $amount;
        }

        return $amount;
    }

    /**
     * The PayPal-generated transaction ID.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return @$this->getData()[self::TRANSACTION_ID];
    }

    /**
     * The email ID of the customer.
     *
     * @return string|null
     */
    public function getPayerEmail(): ?string
    {
        return @$this->getData()[self::PAYER_EMAIL];
    }

    /**
     * The name of the customer.
     *
     * @return string|null
     */
    public function getPayerName(): ?string
    {
        return $this->getData()[self::PAYER_NAME];
    }

    /**
     * The status of the captured payment.
     *
     * The possible values are:
     *    COMPLETED. The funds for this captured payment were credited to the payee's PayPal account.
     *    DECLINED. The funds could not be captured.
     *    PARTIALLY_REFUNDED. An amount less than this captured payment's amount was partially refunded to the payer.
     *    PENDING. The funds for this captured payment was not yet credited to the payee's PayPal account.
     *    REFUNDED. An amount greater than or equal to this captured payment's amount was refunded to the payer.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return @$this->getData()[self::STATUS];
    }

    /**
     * The date and time when the transaction was processed, in Internet date and time format.
     *
     * @return string|null
     */
    public function getTime(): ?string
    {
        return @$this->getData()[self::TIME];
    }
}

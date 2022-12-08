<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-failed_payment_details
 */
class FailedPaymentDetails extends JsonSerializableArrayObject
{
    protected const AMOUNT = 'amount';
    protected const TIME = 'time';
    protected const NEXT_PAYMENT_RETRY_TIME = 'next_payment_retry_time';
    protected const REASON_CODE = 'reason_code';

    const REASON_CODE_PAYMENT_DENIED = 'PAYMENT_DENIED';
    const REASON_CODE_INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';
    const REASON_CODE_PAYEE_ACCOUNT_RESTRICTED = 'PAYEE_ACCOUNT_RESTRICTED';
    const REASON_CODE_PAYER_ACCOUNT_RESTRICTED = 'PAYER_ACCOUNT_RESTRICTED';
    const REASON_CODE_PAYER_CANNOT_PAY = 'PAYER_CANNOT_PAY';
    const REASON_CODE_SENDING_LIMIT_EXCEEDED = 'SENDING_LIMIT_EXCEEDED';
    const REASON_CODE_TRANSACTION_RECEIVING_LIMIT_EXCEEDED = 'TRANSACTION_RECEIVING_LIMIT_EXCEEDED';
    const REASON_CODE_CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';

    /**
     * The failed payment amount.
     *
     * @return Money|null
     */
    public function getAmount(): ?Money
    {
        $amount = $this->{self::AMOUNT};
        if (is_array($amount))
            $this->offsetSet(self::AMOUNT, new Money($amount));

        return $this->{self::AMOUNT};
    }

    /**
     * The date and time when the failed payment was made, in Internet date and time format.
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->{self::TIME};
    }

    /**
     * The time when the retry attempt for the failed payment occurs, in Internet date and time format.
     *
     * @return string|null
     */
    public function getNextPaymentRetryTime(): ?string
    {
        return $this->{self::NEXT_PAYMENT_RETRY_TIME};
    }

    /**
     * The reason code for the payment failure.
     *
     * The possible values are:
     * PAYMENT_DENIED. PayPal declined the payment due to one or more customer issues.
     * INTERNAL_SERVER_ERROR. An internal server error has occurred.
     * PAYEE_ACCOUNT_RESTRICTED. The payee account is not in good standing and cannot receive payments.
     * PAYER_ACCOUNT_RESTRICTED. The payer account is not in good standing and cannot make payments.
     * PAYER_CANNOT_PAY. Payer cannot pay for this transaction.
     * SENDING_LIMIT_EXCEEDED. The transaction exceeds the payer's sending limit.
     * TRANSACTION_RECEIVING_LIMIT_EXCEEDED. The transaction exceeds the receiver's receiving limit.
     * CURRENCY_MISMATCH. The transaction is declined due to a currency mismatch.
     *
     * @return string|null
     */
    public function getReasonCode(): ?string
    {
        return $this->{self::REASON_CODE};
    }
}

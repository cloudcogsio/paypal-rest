<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-last_payment_details
 */
class LastPaymentDetails extends JsonSerializableArrayObject
{
    protected const STATUS = 'status';
    protected const AMOUNT = 'amount';
    protected const TIME = 'time';

    /**
     * The status of the captured payment.
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    /**
     * The last payment amount.
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
     * The date and time when the last payment was made, in Internet date and time format
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->{self::TIME};
    }
}

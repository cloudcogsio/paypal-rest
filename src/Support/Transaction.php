<?php

namespace Cloudcogs\PayPal\Support;

class Transaction extends JsonSerializableArrayObject
{
    protected const STATUS = 'status';
    protected const AMOUNT_WITH_BREAKDOWN = 'amount_with_breakdown';
    protected const TRANSACTION_ID = 'id';
    protected const PAYER_EMAIL = 'payer_email';
    protected const PAYER_NAME = 'payer_name';
    protected const TIME = 'time';

    /**
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     *
     * @return AmountWithBreakdown|null
     */
    public function getAmountWithBreakdown(): ?AmountWithBreakdown
    {
        $amount = $this->{self::AMOUNT_WITH_BREAKDOWN};
        if (is_array($amount))
        {
            $amount = new AmountWithBreakdown($amount);
            $this->offsetSet(self::AMOUNT_WITH_BREAKDOWN, $amount);
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
        return $this->{self::TRANSACTION_ID};
    }

    /**
     * The email ID of the customer.
     *
     * @return string|null
     */
    public function getPayerEmail(): ?string
    {
        return $this->{self::PAYER_EMAIL};
    }

    /**
     * The name of the customer.
     *
     * @return Name|null
     */
    public function getPayerName(): ?Name
    {
        $name = $this->{self::PAYER_NAME};
        if (is_array($name))
        {
            $name = new Name($name);
            $this->offsetSet(self::PAYER_NAME, $name);
        }

        return $name;
    }

    /**
     * The status of the captured payment.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    /**
     * The date and time when the transaction was processed, in Internet date and time format.
     *
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->{self::TIME};
    }
}

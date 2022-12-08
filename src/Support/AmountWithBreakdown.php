<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-amount_with_breakdown
 */
class AmountWithBreakdown extends JsonSerializableArrayObject
{
    protected const GROSS_AMOUNT = 'gross_amount';
    protected const FEE_AMOUNT = 'fee_amount';
    protected const NET_AMOUNT = 'net_amount';
    protected const SHIPPING_AMOUNT = 'shipping_amount';
    protected const TAX_AMOUNT = 'tax_amount';
    protected const TOTAL_ITEM_AMOUNT = 'total_item_amount';

    /**
     * The amount for this transaction.
     *
     * @return Money|null
     */
    public function getGrossAmount(): ?Money
    {
        $amount = $this->{self::GROSS_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::GROSS_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The fee details for the transaction.
     *
     * @return Money|null
     */
    public function getFeeAmount(): ?Money
    {
        $amount = $this->{self::FEE_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::FEE_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The net amount that the payee receives for this transaction in their PayPal account.
     * The net amount is computed as gross_amount minus the paypal_fee.
     *
     * @return Money|null
     */
    public function getNetAmount(): ?Money
    {
        $amount = $this->{self::NET_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::NET_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The shipping amount for the transaction.
     *
     * @return Money|null
     */
    public function getShippingAmount(): ?Money
    {
        $amount = $this->{self::SHIPPING_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::SHIPPING_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The tax amount for the transaction.
     *
     * @return Money|null
     */
    public function getTaxAmount(): ?Money
    {
        $amount = $this->{self::TAX_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::TAX_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The item total for the transaction.
     *
     * @return Money|null
     */
    public function getTotalItemAmount(): ?Money
    {
        $amount = $this->{self::TOTAL_ITEM_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::TOTAL_ITEM_AMOUNT, $amount);
        }

        return $amount;
    }
}

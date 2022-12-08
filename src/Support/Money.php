<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-money
 */
class Money extends JsonSerializableArrayObject
{
    protected const CURRENCY_CODE = 'currency_code';
    protected const VALUE = 'value';

    /**
     * The three-character ISO-4217 currency code that identifies the currency.
     *
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->{self::CURRENCY_CODE};
    }

    /**
     * The three-character ISO-4217 currency code that identifies the currency.
     *
     * @param string $currencyCode
     * @return $this
     */
    public function setCurrencyCode(string $currencyCode): Money
    {
        $this->offsetSet(self::CURRENCY_CODE, $currencyCode);
        return $this;
    }

    /**
     * The value, which might be:
     *  - An integer for currencies like JPY that are not typically fractional.
     *  - A decimal fraction for currencies like TND that are subdivided into thousandths.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->{self::VALUE};
    }

    /**
     * The value, which might be:
     *  - An integer for currencies like JPY that are not typically fractional.
     *  - A decimal fraction for currencies like TND that are subdivided into thousandths.
     *
     * @param string $value
     * @return Money
     */
    public function setValue(string $value): Money
    {
        $this->offsetSet(self::VALUE, $value);
        return $this;
    }
}

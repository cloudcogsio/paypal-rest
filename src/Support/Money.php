<?php

namespace Cloudcogs\PayPal\Support;

class Money extends JsonSerializableArrayObject
{
    protected const CURRENCY_CODE = 'currency_code';
    protected const VALUE = 'value';

    public function getCurrencyCode(): ?string
    {
        return $this->{self::CURRENCY_CODE};
    }

    public function setCurrencyCode(string $currencyCode): Money
    {
        $this->offsetSet(self::CURRENCY_CODE, $currencyCode);
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->{self::VALUE};
    }

    public function setValue(string $value): Money
    {
        $this->offsetSet(self::VALUE, $value);
        return $this;
    }
}

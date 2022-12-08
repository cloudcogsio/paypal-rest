<?php

namespace Cloudcogs\PayPal\Support;

class CurrencyCodes
{
    const AUSTRALIAN_DOLLAR = 'AUD';
    const BRAZILIAN_REAL = 'BRL';
    const CANADIAN_DOLLAR = 'CAD';
    const CHINESE_RENMENBI = 'CNY';
    const CZECH_KORUNA = 'CZK';
    const DANISH_KRONE = 'DKK';
    const EURO = 'EUR';
    const HONG_KONG_DOLLAR = 'HKD';
    const HUNGARIAN_FORINT = 'HUF';
    const ISRAELI_NEW_SHEKEL = 'ILS';
    const JAPANESE_YEN = 'JPY';
    const MALAYSIAN_RINGGIT = 'MYR';
    const MEXICAN_PESO = 'MXN';
    const NEW_TAIWAN_DOLLAR = 'TWD';
    const NEW_ZEALAND_DOLLAR = 'NZD';
    const NORWEGIAN_KRONE = 'NOK';
    const PHILIPPINE_PESO = 'PHP';
    const POLISH_ZLOTY = 'PLN';
    const POUND_STERLING = 'GBP';
    const RUSSIAN_RUBBLE = 'RUB';
    const SINGAPORE_DOLLAR = 'SGD';
    const SWEDISH_KRONA = 'SEK';
    const SWISS_FRANC = 'CHF';
    const THAI_BAHT = 'THB';
    const UNITED_STATES_DOLLAR = 'USD';

    public function __invoke(): array
    {
        $currencies = [];

        $reflection = new \ReflectionClass(__CLASS__);
        $constants = $reflection->getConstants();

        foreach ($constants as $name => $constant)
        {
            $currencies[$constant] = $name;
        }

        return $currencies;
    }
}
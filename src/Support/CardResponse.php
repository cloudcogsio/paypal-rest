<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-card_response
 */
class CardResponse extends JsonSerializableArrayObject
{
    protected const BRAND = 'brand';
    protected const LAST_DIGITS = 'last_digits';
    protected const TYPE = 'type';

    const TYPE_CREDIT = 'CREDIT';
    const TYPE_DEBIT = 'DEBIT';
    const TYPE_PREPAID = 'PREPAID';
    const TYPE_UNKNOWN = 'UNKNOWN';

    const BRAND_VISA = 'VISA';
    const BRAND_MASTERCARD = 'MASTERCARD';
    const BRAND_DISCOVER = 'DISCOVER';
    const BRAND_AMEX = 'AMEX';
    const BRAND_SOLO = 'SOLO';
    const BRAND_JCB = 'JCB';
    const BRAND_STAR = 'STAR';
    const BRAND_DELTA = 'DELTA';
    const BRAND_SWITCH = 'SWITCH';
    const BRAND_MAESTRO = 'MAESTRO';
    const BRAND_CB_NATIONALE = 'CB_NATIONALE';
    const BRAND_CONFIGOGA = 'CONFIGOGA';
    const BRAND_CONFIDIS = 'CONFIDIS';
    const BRAND_ELECTRON = 'ELECTRON';
    const BRAND_CETELEM = 'CETELEM';
    const BRAND_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /**
     * @return string|null The card brand or network. Typically used in the response.
     *
     * The possible values are:
     *  VISA. Visa card.
     *  MASTERCARD. Mastecard card.
     *  DISCOVER. Discover card.
     *  AMEX. American Express card.
     *  SOLO. Solo debit card.
     *  JCB. Japan Credit Bureau card.
     *  STAR. Military Star card.
     *  DELTA. Delta Airlines card.
     *  SWITCH. Switch credit card.
     *  MAESTRO. Maestro credit card.
     *  CB_NATIONALE. Carte Bancaire (CB) credit card.
     *  CONFIGOGA. Configoga credit card.
     *  CONFIDIS. Confidis credit card.
     *  ELECTRON. Visa Electron credit card.
     *  CETELEM. Cetelem credit card.
     *  CHINA_UNION_PAY. China union pay credit card.
     */
    public function getBrand(): ?string
    {
        return $this->{self::BRAND};
    }

    /**
     * @return string|null The last digits of the payment card.
     */
    public function getLastDigits(): ?string
    {
        return $this->{self::LAST_DIGITS};
    }

    /**
     * @return string|null The payment card type.
     *
     * The possible values are:
     *  CREDIT. A credit card.
     *  DEBIT. A debit card.
     *  PREPAID. A Prepaid card.
     *  UNKNOWN. Card type cannot be determined.
     */
    public function getType(): ?string {
        return $this->{self::TYPE};
    }
}

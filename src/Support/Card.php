<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-payment_source.card
 */
class Card extends CardResponseWithBillingAddress
{
    protected const EXPIRY = 'expiry';
    protected const NUMBER = 'number';
    protected const SECURITY_CODE = 'security_code';
    protected const ID = 'id';

    /**
     * The card expiration year and month, in Internet date format.
     * YYYY-MM
     * @return string
     */
    public function getExpiry(): string
    {
        return (string) $this->{self::EXPIRY};
    }

    /**
     * @param DateYearMonth $expiry The card expiration year and month, in Internet date format. (YYYY-MM)
     * @return Card
     */
    public function setExpiry(DateYearMonth $expiry): Card
    {
        $this->offsetSet(self::EXPIRY, $expiry);
        return $this;
    }

    /**
     * The primary account number (PAN) for the payment card.
     * @return string
     */
    public function getNumber(): string
    {
        return $this->{self::NUMBER};
    }

    /**
     * @param string $pan The primary account number (PAN) for the payment card.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setNumber(string $pan): Card
    {
        $length = strlen($pan);
        if ($length < 13 || $length > 19) throw new ValueOutOfBoundsException($pan);

        $this->offsetSet(self::NUMBER, $pan);
        return $this;
    }

    /**
     * The three- or four-digit security code of the card. Also known as the CVV, CVC, CVN, CVE, or CID.
     *
     * @return string|null
     */
    public function getSecurityCode(): ?string
    {
        return $this->{self::SECURITY_CODE};
    }

    /**
     * @param string $code The three- or four-digit security code of the card. Also known as the CVV, CVC, CVN, CVE, or CID.
     * @return $this
     */
    public function setSecurityCode(string $code): Card
    {
        $this->offsetSet(self::SECURITY_CODE, $code);
        return $this;
    }

    /**
     * @return string|null The PayPal-generated ID for the card.
     */
    public function getId(): ?string
    {
        return $this->{self::ID};
    }
}

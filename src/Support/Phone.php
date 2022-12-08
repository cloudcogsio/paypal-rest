<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-phone
 */
class Phone extends JsonSerializableArrayObject
{
    protected const COUNTRY_CODE = 'country_code';
    protected const NATIONAL_NUMBER = 'national_number';
    protected const EXTENSION_NUMBER = 'extension_number';

    /**
     * The country calling code (CC), in its canonical international E.164 numbering plan format
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->{self::COUNTRY_CODE};
    }

    /**
     * @param string $value The country calling code (CC), in its canonical international E.164 numbering plan format.
     * The combined length of the CC and the national number must not be greater than 15 digits.
     * The national number consists of a national destination code (NDC) and subscriber number (SN).
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setCountryCode(string $value): Phone
    {
        $strlen = strlen($value);
        if ($strlen < 1 || $strlen > 3) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::COUNTRY_CODE, $value);
        return $this;
    }

    /**
     * The national number, in its canonical international E.164 numbering plan format.
     *
     * @return string|null
     */
    public function getNationalNumber(): string
    {
        return $this->{self::NATIONAL_NUMBER};
    }

    /**
     * @param string $value The national number, in its canonical international E.164 numbering plan format.
     * The combined length of the country calling code (CC) and the national number must not be greater than 15 digits.
     * The national number consists of a national destination code (NDC) and subscriber number (SN).
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setNationalNumber(string $value): Phone
    {
        $strlen = strlen($value);
        if ($strlen < 1 || $strlen > 14) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::NATIONAL_NUMBER, $value);
        return $this;
    }

    /**
     * The extension number.
     *
     * @return string|null
     */
    public function getExtensionNumber(): ?string
    {
        return $this->{self::EXTENSION_NUMBER};
    }

    /**
     * @param string $value The extension number.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setExtensionNumber(string $value): Phone
    {
        $strlen = strlen($value);
        if ($strlen < 1 || $strlen > 15) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::EXTENSION_NUMBER, $value);
        return $this;
    }
}

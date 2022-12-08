<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-phone_with_type
 */
class PhoneWithType extends JsonSerializableArrayObject
{
    protected const PHONE_NUMBER = 'phone_number';
    protected const PHONE_TYPE = 'phone_type';

    const PHONE_TYPE_FAX = 'FAX';
    const PHONE_TYPE_HOME = 'HOME';
    const PHONE_TYPE_MOBILE = 'MOBILE';
    const PHONE_TYPE_OTHER = 'OTHER';
    const PHONE_TYPE_PAGER = 'PAGER';

    /**
     * The phone number, in its canonical international E.164 numbering plan format.
     * Supports only the national_number property.
     *
     * @return Phone
     */
    public function getPhoneNumber(): Phone
    {
        $phone = $this->{self::PHONE_NUMBER};
        if (is_array($phone))
            $this->setPhoneNumber(new Phone($phone));

        return $this->{self::PHONE_NUMBER};
    }

    /**
     * @param Phone $phone The phone number, in its canonical international E.164 numbering plan format.
     * Supports only the national_number property.
     *
     * @return $this
     */
    public function setPhoneNumber(Phone $phone): PhoneWithType
    {
        $this->offsetSet(self::PHONE_NUMBER, $phone);
        return $this;
    }

    /**
     * The phone type.
     *
     * @return string|null
     */
    public function getPhoneType(): ?string
    {
        return $this->{self::PHONE_TYPE};
    }

    /**
     * @param string $phoneType The phone type.
     * @return PhoneWithType
     * @throws ValueOutOfBoundsException
     */
    public function setPhoneType(string $phoneType): PhoneWithType
    {
        switch ($phoneType)
        {
            case self::PHONE_TYPE_FAX:
            case self::PHONE_TYPE_HOME:
            case self::PHONE_TYPE_MOBILE:
            case self::PHONE_TYPE_OTHER:
            case self::PHONE_TYPE_PAGER:
                $this->offsetSet(self::PHONE_TYPE, $phoneType);
                return $this;
        }

        throw new ValueOutOfBoundsException($phoneType);
    }
}

<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Exception\InvalidEmailAddressException;
use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Name;
use Cloudcogs\PayPal\Support\PhoneWithType;
use Cloudcogs\PayPal\Support\ShippingDetail;

abstract class AbstractSubscriber extends JsonSerializableArrayObject
{
    protected const EMAIL_ADDRESS = 'email_address';
    protected const NAME = 'name';
    protected const PAYER_ID = 'payer_id';
    protected const PHONE = 'phone';
    protected const PAYMENT_SOURCE = 'payment_source';
    protected const SHIPPING_ADDRESS = 'shipping_address';

    /**
     * The email address of the payer.
     *
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->{self::EMAIL_ADDRESS};
    }

    /**
     * @param string $email The email address of the payer.
     * @return AbstractSubscriber
     * @throws InvalidEmailAddressException
     */
    public function setEmailAddress(string $email): AbstractSubscriber
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->offsetSet(self::EMAIL_ADDRESS, $email);
            return $this;
        }

        throw new InvalidEmailAddressException($email);
    }

    /**
     * The name of the payer. Supports only the given_name and surname properties.
     *
     * @return Name|null
     */
    public function getName(): ?Name
    {
        $name = $this->{self::NAME};

        if (is_array($name))
            $this->setName(new Name($name));

        return $this->{self::NAME};
    }

    /**
     * @param Name $name The name of the payer. Supports only the given_name and surname properties.
     * @return AbstractSubscriber
     */
    public function setName(Name $name): AbstractSubscriber
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    /**
     * The PayPal-assigned ID for the payer.
     *
     * @return string|null
     */
    public function getPayerId(): ?string
    {
        return $this->{self::PAYER_ID};
    }

    /**
     * @param string $payerId The PayPal-assigned ID for the payer.
     * @return AbstractSubscriber
     * @throws ValueOutOfBoundsException
     */
    public function setPayerId(string $payerId): AbstractSubscriber
    {
        if (strlen($payerId) != 13) throw new ValueOutOfBoundsException($payerId);

        $this->offsetSet(self::PAYER_ID, $payerId);
        return $this;
    }

    /**
     * The phone number of the customer.
     *
     * @return PhoneWithType|null
     */
    public function getPhone(): ?PhoneWithType
    {
        $phone = $this->{self::PHONE};
        if (is_array($phone))
            $this->setPhone(new PhoneWithType($phone));

        return $this->{self::PHONE};
    }

    /**
     * @param PhoneWithType $phoneWithType The phone number of the customer.
     * Available only when you enable the Contact Telephone Number option in the Profile & Settings for the
     * merchant's PayPal account. The phone.phone_number supports only national_number.
     *
     * @return AbstractSubscriber
     */
    public function setPhone(PhoneWithType $phoneWithType): AbstractSubscriber
    {
        $this->offsetSet(self::PHONE, $phoneWithType);
        return $this;
    }

    /**
     * The shipping details.
     *
     * @return ShippingDetail|null
     */
    public function getShippingAddress(): ?ShippingDetail
    {
        $detail = $this->{self::SHIPPING_ADDRESS};
        if (is_array($detail))
            $this->setShippingAddress(new ShippingDetail($detail));

        return $this->{self::SHIPPING_ADDRESS};
    }

    /**
     * @param ShippingDetail $shippingDetail The shipping details.
     * @return AbstractSubscriber
     */
    public function setShippingAddress(ShippingDetail $shippingDetail): AbstractSubscriber
    {
        $this->offsetSet(self::SHIPPING_ADDRESS, $shippingDetail);
        return $this;
    }
}

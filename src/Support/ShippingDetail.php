<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-shipping_detail
 */
class ShippingDetail extends JsonSerializableArrayObject
{
    protected const ADDRESS = 'address';
    protected const NAME = 'name';

    /**
     * The address of the person to whom to ship the items.
     *
     * @return AddressPortable|null
     */
    public function getAddress(): ?AddressPortable
    {
        $address = $this->{self::ADDRESS};
        if (is_array($address))
            $this->setAddress(new AddressPortable($address));

        return $this->{self::ADDRESS};
    }

    /**
     * @param AddressPortable $address The address of the person to whom to ship the items.
     * Supports only the address_line_1, address_line_2, admin_area_1, admin_area_2, postal_code, and country_code properties.
     *
     * @return $this
     */
    public function setAddress(AddressPortable $address): ShippingDetail
    {
        $this->offsetSet(self::ADDRESS, $address);
        return $this;
    }

    /**
     * The name of the person to whom to ship the items.
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
     * @param Name $name The name of the person to whom to ship the items. Supports only the full_name property.
     * @return $this
     */
    public function setName(Name $name): ShippingDetail
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }
}

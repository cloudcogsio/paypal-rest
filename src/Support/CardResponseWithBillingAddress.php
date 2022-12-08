<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-card_response_with_billing_address
 */
class CardResponseWithBillingAddress extends CardResponse
{
    protected const BILLING_ADDRESS = 'billing_address';
    protected const NAME = 'name';

    /**
     * The billing address for this card.
     *
     * @return AddressPortable|null
     */
    public function getBillingAddress(): ?AddressPortable
    {
        $address = $this->{self::BILLING_ADDRESS};
        if (is_array($address))
            $this->setBillingAddress(new AddressPortable($address));

        return $this->{self::BILLING_ADDRESS};
    }

    /**
     * @param AddressPortable $address The billing address for this card.
     * Supports only the address_line_1, address_line_2, admin_area_1, admin_area_2, postal_code, and country_code properties.
     *
     * @return CardResponseWithBillingAddress
     */
    public function setBillingAddress(AddressPortable $address): CardResponseWithBillingAddress
    {
        $this->offsetSet(self::BILLING_ADDRESS, $address);
        return $this;
    }

    /**
     * The cardholder's name as it appears on the card.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    /**
     * @param string $cardholderName The cardholder's name as it appears on the card.
     * @return CardResponseWithBillingAddress
     * @throws ValueOutOfBoundsException
     */
    public function setName(string $cardholderName): CardResponseWithBillingAddress
    {
        if (strlen($cardholderName) > 300) throw new ValueOutOfBoundsException($cardholderName);

        $this->offsetSet(self::NAME, $cardholderName);
        return $this;
    }
}

<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-payment_source_response
 */
class PaymentSourceResponse extends JsonSerializableArrayObject
{
    protected const CARD = 'card';

    /**
     * The payment card to use to fund a payment. Can be a credit or debit card.
     * @return CardResponseWithBillingAddress|null
     */
    public function getCard(): ?CardResponseWithBillingAddress
    {
        $card = $this->{self::CARD};
        if (is_array($card))
            $this->setCard(new CardResponseWithBillingAddress($card));

        return $this->{self::CARD};
    }

    /**
     * @param CardResponseWithBillingAddress $card The payment card to use to fund a payment. Can be a credit or debit card.
     * @return PaymentSourceResponse
     */
    public function setCard(CardResponseWithBillingAddress $card): PaymentSourceResponse
    {
        $this->offsetSet(self::CARD, $card);
        return $this;
    }
}

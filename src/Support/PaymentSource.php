<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-payment_source
 */
class PaymentSource extends JsonSerializableArrayObject
{
    protected const CARD = 'card';

    /**
     * The payment card to use to fund a payment. Can be a credit or debit card.
     * @return Card|null
     */
    public function getCard(): ?Card
    {
        $card = $this->{self::CARD};
        if (is_array($card))
            $this->setCard(new Card($card));

        return $this->{self::CARD};
    }

    /**
     * @param Card $card The payment card to use to fund a payment. Can be a credit or debit card.
     * @return $this
     */
    public function setCard(Card $card): PaymentSource
    {
        $this->offsetSet(self::CARD, $card);
        return $this;
    }
}

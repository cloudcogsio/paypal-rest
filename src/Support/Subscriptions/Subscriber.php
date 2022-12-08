<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\PaymentSourceResponse;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-subscriber
 */
class Subscriber extends AbstractSubscriber
{
    /**
     * The payment source definition.
     *
     * @return PaymentSourceResponse|null
     */
    public function getPaymentSource(): ?PaymentSourceResponse
    {
        $source = $this->{self::PAYMENT_SOURCE};
        if (is_array($source))
            $this->setPaymentSource(new PaymentSourceResponse($source));

        return $this->{self::PAYMENT_SOURCE};
    }

    /**
     * The payment source definition.
     *
     * To be eligible to create subscription using debit or credit card, you will need to sign up here
     * (https://www.paypal.com/bizsignup/entry/product/ppcp).
     * Please note, its available only for non-3DS cards and for merchants in US and AU regions.
     *
     * @param PaymentSourceResponse $paymentSource
     * @return $this
     */
    public function setPaymentSource(PaymentSourceResponse $paymentSource): Subscriber
    {
        $this->offsetSet(self::PAYMENT_SOURCE, $paymentSource);
        return $this;
    }
}

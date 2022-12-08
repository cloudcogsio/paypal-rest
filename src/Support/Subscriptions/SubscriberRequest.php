<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\PaymentSource;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-subscriber_request
 */
class SubscriberRequest extends AbstractSubscriber
{
    /**
     * The payment source definition.
     *
     * @return PaymentSource|null
     */
    public function getPaymentSource(): ?PaymentSource
    {
        $source = $this->{self::PAYMENT_SOURCE};
        if (is_array($source))
            $this->setPaymentSource(new PaymentSource($source));

        return $this->{self::PAYMENT_SOURCE};
    }

    /**
     * The payment source definition.
     *
     * To be eligible to create subscription using debit or credit card, you will need to sign up here
     * (https://www.paypal.com/bizsignup/entry/product/ppcp).
     * Please note, its available only for non-3DS cards and for merchants in US and AU regions.
     *
     * @param PaymentSource $paymentSource
     * @return $this
     */
    public function setPaymentSource(PaymentSource $paymentSource): SubscriberRequest
    {
        $this->offsetSet(self::PAYMENT_SOURCE, $paymentSource);
        return $this;
    }
}

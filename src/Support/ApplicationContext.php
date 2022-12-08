<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * https://developer.paypal.com/docs/api/subscriptions/v1/#definition-application_context
 */
class ApplicationContext extends JsonSerializableArrayObject
{
    protected const CANCEL_URL = 'cancel_url';
    protected const RETURN_URL = 'return_url';
    protected const BRAND_NAME = 'brand_name';
    protected const LOCALE = 'locale';
    protected const PAYMENT_METHOD = 'payment_method';
    protected const SHIPPING_PREFERENCE = 'shipping_preference';
    protected const USER_ACTION = 'user_action';

    // After you redirect the customer to the PayPal subscription consent page, a Continue button appears.
    // Use this option when you want to control the activation of the subscription and do not want PayPal to
    // activate the subscription.
    const USER_ACTION_CONTINUE = 'CONTINUE';

    // After you redirect the customer to the PayPal subscription consent page, a Subscribe Now button appears.
    // Use this option when you want PayPal to activate the subscription.
    const USER_ACTION_SUBSCRIBE_NOW = 'SUBSCRIBE_NOW';

    // Get the customer-provided shipping address on the PayPal site.
    const SHIPPING_PREFERENCE_FROM_FILE = 'GET_FROM_FILE';

    //  Redacts the shipping address from the PayPal site. Recommended for digital goods.
    const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';

    // Get the merchant-provided address. The customer cannot change this address on the PayPal site.
    // If merchant does not pass an address, customer can choose the address on PayPal pages.
    const SHIPPING_PREFERENCE_SET_PROVIDED = 'SET_PROVIDED_ADDRESS';

    /**
     * The URL where the customer is redirected after the customer cancels the payment.
     *
     * @return string
     */
    public function getCancelUrl(): string
    {
        return $this->{self::CANCEL_URL};
    }

    /**
     * @param string $cancelUrl The URL where the customer is redirected after the customer cancels the payment.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setCancelUrl(string $cancelUrl): ApplicationContext
    {
        $length = strlen($cancelUrl);
        if ($length < 10 || $length > 4000) throw new ValueOutOfBoundsException($cancelUrl);

        $this->offsetSet(self::CANCEL_URL, $cancelUrl);
        return $this;
    }

    /**
     * The URL where the customer is redirected after the customer approves the payment.
     *
     * @return string
     */
    public function getReturnUrl(): string
    {
        return $this->{self::RETURN_URL};
    }

    /**
     * @param string $returnUrl The URL where the customer is redirected after the customer approves the payment.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setReturnUrl(string $returnUrl): ApplicationContext
    {
        $length = strlen($returnUrl);
        if ($length < 10 || $length > 4000) throw new ValueOutOfBoundsException($returnUrl);

        $this->offsetSet(self::RETURN_URL, $returnUrl);
        return $this;
    }

    /**
     * The label that overrides the business name in the PayPal account on the PayPal site.
     *
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->{self::BRAND_NAME};
    }

    /**
     * @param string $brandName The label that overrides the business name in the PayPal account on the PayPal site.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setBrandName(string $brandName): ApplicationContext
    {
        $length = strlen($brandName);
        if ($length < 1 || $length > 127) throw new ValueOutOfBoundsException($brandName);

        $this->offsetSet(self::BRAND_NAME, $brandName);
        return $this;
    }

    /**
     * The BCP 47-formatted locale of pages that the PayPal payment experience shows.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->{self::LOCALE};
    }

    /**
     * @param string $locale The BCP 47-formatted locale of pages that the PayPal payment experience shows.
     * PayPal supports a five-character code.
     * For example, da-DK, he-IL, id-ID, ja-JP, no-NO, pt-BR, ru-RU, sv-SE, th-TH, zh-CN, zh-HK, or zh-TW.
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setLocale(string $locale): ApplicationContext
    {
        $length = strlen($locale);
        if ($length < 2 || $length > 10) throw new ValueOutOfBoundsException($locale);

        $this->offsetSet(self::LOCALE, $locale);
        return $this;
    }

    /**
     * The customer and merchant payment preferences. Currently only PAYPAL payment method is supported.
     *
     * @return PaymentMethod|null
     */
    public function getPaymentMethod(): ?PaymentMethod
    {
        $paymentMethod = $this->{self::PAYMENT_METHOD};
        if (is_array($paymentMethod))
            $this->setPaymentMethod(new PaymentMethod($paymentMethod));

        return $this->{self::PAYMENT_METHOD};
    }

    /**
     * @param PaymentMethod $paymentMethod The customer and merchant payment preferences. Currently only PAYPAL payment method is supported.
     * @return $this
     */
    public function setPaymentMethod(PaymentMethod $paymentMethod): ApplicationContext
    {
        $this->offsetSet(self::PAYMENT_METHOD, $paymentMethod);
        return $this;
    }

    /**
     * The location from which the shipping address is derived.
     * @return string|null
     */
    public function getShippingPreference(): ?string
    {
        return $this->{self::SHIPPING_PREFERENCE};
    }

    /**
     * @param string $preference The location from which the shipping address is derived.
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setShippingPreference(string $preference): ApplicationContext
    {
        switch ($preference)
        {
            case self::SHIPPING_PREFERENCE_FROM_FILE:
            case self::SHIPPING_PREFERENCE_NO_SHIPPING:
            case self::SHIPPING_PREFERENCE_SET_PROVIDED:
                $this->offsetSet(self::SHIPPING_PREFERENCE, $preference);
                return $this;
        }

        throw new ValueOutOfBoundsException($preference);
    }

    /**
     * Configures the label name to Continue or Subscribe Now for subscription consent experience.
     *
     * @return string|null
     */
    public function getUserAction(): ?string
    {
        return $this->{self::USER_ACTION};
    }

    /**
     * The possible values are:
     *   CONTINUE. After you redirect the customer to the PayPal subscription consent page, a Continue button appears.
     *      Use this option when you want to control the activation of the subscription and do not want PayPal to activate the subscription.
     *   SUBSCRIBE_NOW. After you redirect the customer to the PayPal subscription consent page,
     *      a Subscribe Now button appears. Use this option when you want PayPal to activate the subscription.
     *
     * @param string $action
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setUserAction(string $action): ApplicationContext
    {
        switch ($action)
        {
            case self::USER_ACTION_CONTINUE:
            case self::USER_ACTION_SUBSCRIBE_NOW:
                $this->offsetSet(self::USER_ACTION, $action);
                return $this;
        }

        throw new ValueOutOfBoundsException($action);
    }
}

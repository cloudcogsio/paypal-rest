<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Support\DateTime;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Money;

abstract class AbstractSubscription extends JsonSerializableArrayObject
{
    protected const PLAN_ID = 'plan_id';
    protected const CUSTOM_ID = 'custom_id';
    protected const PLAN = 'plan';
    protected const QUANTITY = 'quantity';
    protected const SHIPPING_AMOUNT = 'shipping_amount';
    protected const START_TIME = 'start_time';
    protected const SUBSCRIBER = 'subscriber';

    /**
     * The ID of the plan.
     *
     * @return string|null
     */
    public function getPlanId(): ?string
    {
        return $this->{self::PLAN_ID};
    }

    /**
     * The ID of the plan.
     *
     * @param string $planId
     * @return AbstractSubscription
     * @throws ValueOutOfBoundsException
     */
    public function setPlanId(string $planId): AbstractSubscription
    {
        $length = strlen($planId);
        if ($length < 3 || $length > 50) throw new ValueOutOfBoundsException($planId);

        $this->offsetSet(self::PLAN_ID, $planId);
        return $this;
    }

    /**
     * The custom id for the subscription. Can be invoice id.
     *
     * @return string|null
     */
    public function getCustomId(): ?string
    {
        return $this->{self::CUSTOM_ID};
    }

    /**
     * The custom id for the subscription. Can be invoice id.
     *
     * @param string $customId
     * @return AbstractSubscription
     * @throws ValueOutOfBoundsException
     */
    public function setCustomId(string $customId): AbstractSubscription
    {
        $length = strlen($customId);
        if ($length < 1 || $length > 127) throw new ValueOutOfBoundsException($customId);

        $this->offsetSet(self::CUSTOM_ID, $customId);
        return $this;
    }

    /**
     * The quantity of the product in the subscription.
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->{self::QUANTITY};
    }

    /**
     * The quantity of the product in the subscription.
     *
     * @param int $quantity
     * @return AbstractSubscription
     * @throws ValueOutOfBoundsException
     */
    public function setQuantity(int $quantity): AbstractSubscription
    {
        if ($quantity < 1 || $quantity > 32) throw new ValueOutOfBoundsException($quantity);

        $this->offsetSet(self::QUANTITY, $quantity);
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getShippingAmount(): ?Money
    {
        $amount = $this->{self::SHIPPING_AMOUNT};
        if (is_array($amount))
        {
            $amount = new Money($amount);
            $this->offsetSet(self::SHIPPING_AMOUNT, $amount);
        }

        return $amount;
    }

    /**
     * The shipping charges.
     *
     * @param Money $shipping
     * @return AbstractSubscription
     */
    public function setShippingAmount(Money $shipping): AbstractSubscription
    {
        $this->offsetSet(self::SHIPPING_AMOUNT, $shipping);
        return $this;
    }

    /**
     * @return string|null The date and time when the subscription started, in Internet date and time format.
     */
    public function getStartTime(): ?string
    {
        return $this->{self::START_TIME};
    }

    /**
     * The date and time when the subscription started, in Internet date and time format.
     *
     * @param DateTime $startTime
     * @return AbstractSubscription
     */
    public function setStartTime(DateTime $startTime): AbstractSubscription
    {
        $this->offsetSet(self::START_TIME, $startTime->__toString());
        return $this;
    }
}

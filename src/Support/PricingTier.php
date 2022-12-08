<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\PricingTierStartingQuantityOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-pricing_tier
 */
class PricingTier extends JsonSerializableArrayObject
{
    protected const AMOUNT = 'amount';
    protected const STARTING_QUANTITY = 'starting_quantity';
    protected const ENDING_QUANTITY = 'ending_quantity';

    /**
     * The pricing amount for the tier.
     *
     * @return Money|null
     */
    public function getAmount(): ?Money
    {
        if (is_array($this->{self::AMOUNT}))
            $this->setAmount(new Money($this->{self::AMOUNT}));

        return $this->{self::AMOUNT};
    }

    /**
     * The pricing amount for the tier.
     *
     * @param Money $amount
     * @return $this
     */
    public function setAmount(Money $amount): PricingTier
    {
        $this->offsetSet(self::AMOUNT, $amount);
        return $this;
    }

    /**
     * The starting quantity for the tier.
     *
     * @return string|null
     */
    public function getStartingQuantity(): ?string
    {
        return $this->{self::STARTING_QUANTITY};
    }

    /**
     * The starting quantity for the tier.
     *
     * @param string $startingQuantity
     * @return $this
     * @throws PricingTierStartingQuantityOutOfBoundsException
     */
    public function setStartingQuantity(string $startingQuantity): PricingTier
    {
        if ($startingQuantity < 1 || strlen($startingQuantity) > 32)
            throw new PricingTierStartingQuantityOutOfBoundsException($startingQuantity);

        $this->offsetSet(self::STARTING_QUANTITY, $startingQuantity);
        return $this;
    }

    /**
     * The ending quantity for the tier. Optional for the last tier.
     *
     * @return string|null
     */
    public function getEndingQuantity(): ?string
    {
        return $this->{self::ENDING_QUANTITY};
    }

    /**
     * The ending quantity for the tier. Optional for the last tier.
     *
     * @param string $endingQuantity
     * @return $this
     * @throws PricingTierStartingQuantityOutOfBoundsException
     */
    public function setEndingQuantity(string $endingQuantity): PricingTier
    {
        if ($endingQuantity < 1 || strlen($endingQuantity) > 32)
            throw new PricingTierStartingQuantityOutOfBoundsException($endingQuantity);

        $this->offsetSet(self::ENDING_QUANTITY, $endingQuantity);
        return $this;
    }
}

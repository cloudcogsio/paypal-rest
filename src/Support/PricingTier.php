<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\PricingTierStartingQuantityOutOfBoundsException;

class PricingTier extends JsonSerializableArrayObject
{
    protected const AMOUNT = 'amount';
    protected const STARTING_QUANTITY = 'starting_quantity';
    protected const ENDING_QUANTITY = 'ending_quantity';

    public function getAmount(): ?Money
    {
        if (is_array($this->{self::AMOUNT}))
            $this->setAmount(new Money($this->{self::AMOUNT}));

        return $this->{self::AMOUNT};
    }

    public function setAmount(Money $amount): PricingTier
    {
        $this->offsetSet(self::AMOUNT, $amount);
        return $this;
    }

    public function getStartingQuantity(): ?string
    {
        return $this->{self::STARTING_QUANTITY};
    }

    public function setStartingQuantity(string $startingQuantity): PricingTier
    {
        if ($startingQuantity < 1 || strlen($startingQuantity) > 32)
            throw new PricingTierStartingQuantityOutOfBoundsException($startingQuantity);

        $this->offsetSet(self::STARTING_QUANTITY, $startingQuantity);
        return $this;
    }

    public function getEndingQuantity(): ?string
    {
        return $this->{self::ENDING_QUANTITY};
    }

    public function setEndingQuantity(string $endingQuantity): PricingTier
    {
        if ($endingQuantity < 1 || strlen($endingQuantity) > 32)
            throw new PricingTierStartingQuantityOutOfBoundsException($endingQuantity);

        $this->offsetSet(self::ENDING_QUANTITY, $endingQuantity);
        return $this;
    }
}

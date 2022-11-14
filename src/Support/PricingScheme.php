<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\InvalidPricingModelException;

class PricingScheme extends JsonSerializableArrayObject
{
    protected const CREATE_TIME = 'create_time';
    protected const FIXED_PRICE = 'fixed_price';
    protected const PRICING_MODEL = 'pricing_model';
    protected const TIERS = 'tiers';
    protected const UPDATE_TIME = 'update_time';
    protected const VERSION = 'version';

    const PRICING_MODEL_VOLUME = 'VOLUME';
    const PRICING_MODEL_TIERED = 'TIERED';

    public function getCreateTime(): ?\DateTime
    {
        return ($this->offsetExists(self::CREATE_TIME)) ?
            new \DateTime($this->{self::CREATE_TIME}) :
            null;
    }

    public function getUpdateTime(): ?\DateTime
    {
        return ($this->offsetExists(self::UPDATE_TIME)) ?
            new \DateTime($this->{self::UPDATE_TIME}) :
            null;
    }

    public function getFixedPrice(): ?Money
    {
        if (is_array($this->{self::FIXED_PRICE}))
            $this->setFixedPrice(new Money($this->{self::FIXED_PRICE}));

        return $this->{self::FIXED_PRICE};
    }

    public function setFixedPrice(Money $price): PricingScheme
    {
        $this->offsetSet(self::FIXED_PRICE, $price);
        return $this;
    }

    public function getPricingModel(): string
    {
        return $this->{self::PRICING_MODEL};
    }

    public function setPricingModel(string $pricingModel): PricingScheme
    {
        switch ($pricingModel)
        {
            case self::PRICING_MODEL_VOLUME:
            case self::PRICING_MODEL_TIERED:
                $this->offsetSet(self::PRICING_MODEL, $pricingModel);
                return $this;
        }

        throw new InvalidPricingModelException($pricingModel);
    }

    public function getTiers(): ?array
    {
        $tiers = $this->{self::TIERS};
        if (is_array($tiers) && count($tiers) > 0)
        {
            foreach ($tiers as $i => $tier)
            {
                if (is_array($tier))
                    $tiers[$i] = new PricingTier($tier);
            }

            $this->setTiers($tiers);
        }

        return $this->{self::TIERS};
    }

    public function setTiers(array $tiers): PricingScheme
    {
        $this->offsetSet(self::TIERS, $tiers);
        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->{self::VERSION};
    }
}

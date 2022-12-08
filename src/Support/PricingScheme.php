<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\InvalidPricingModelException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-pricing_scheme
 */
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

    /**
     * The date and time when this pricing scheme was created, in Internet date and time format.
     *
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->{self::CREATE_TIME};
    }

    /**
     * The date and time when this pricing scheme was last updated, in Internet date and time format.
     *
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->{self::UPDATE_TIME};
    }

    /**
     * The fixed amount to charge for the subscription.
     *
     * @return Money|null
     */
    public function getFixedPrice(): ?Money
    {
        if (is_array($this->{self::FIXED_PRICE}))
            $this->setFixedPrice(new Money($this->{self::FIXED_PRICE}));

        return $this->{self::FIXED_PRICE};
    }

    /**
     * The fixed amount to charge for the subscription.
     * The changes to fixed amount are applicable to both existing and future subscriptions.
     * For existing subscriptions, payments within 10 days of price change are not affected.
     *
     * @param Money $price
     * @return PricingScheme
     */
    public function setFixedPrice(Money $price): PricingScheme
    {
        $this->offsetSet(self::FIXED_PRICE, $price);
        return $this;
    }

    /**
     * The pricing model for tiered plan.
     *
     * @return string
     */
    public function getPricingModel(): string
    {
        return $this->{self::PRICING_MODEL};
    }

    /**
     * The pricing model for tiered plan. The tiers parameter is required.
     * The possible values are:
     *  VOLUME. A volume pricing model.
     *  TIERED. A tiered pricing model.
     *
     * @param string $pricingModel
     * @return $this
     * @throws InvalidPricingModelException
     */
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

    /**
     * An array of pricing tiers which are used for billing volume/tiered plans. pricing_model field has to be specified.
     *
     * @return array|null
     */
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

    /**
     * An array of pricing tiers which are used for billing volume/tiered plans. pricing_model field has to be specified.
     *
     * @param array $tiers
     * @return $this
     */
    public function setTiers(array $tiers): PricingScheme
    {
        $this->offsetSet(self::TIERS, $tiers);
        return $this;
    }

    /**
     * The version of the pricing scheme.
     *
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->{self::VERSION};
    }
}

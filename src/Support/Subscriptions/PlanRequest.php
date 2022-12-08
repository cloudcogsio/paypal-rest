<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Exception\InvalidPlanStatusException;
use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Support\PaymentPreferences;
use Cloudcogs\PayPal\Support\Taxes;

class PlanRequest extends AbstractPlan
{
    protected const NAME = 'name';
    protected const PRODUCT_ID = 'product_id';
    protected const DESCRIPTION = 'description';
    protected const QUANTITY_SUPPORTED = 'quantity_supported';
    protected const STATUS = 'status';

    const PLAN_STATUS_CREATED = 'CREATED';
    const PLAN_STATUS_INACTIVE = 'INACTIVE';
    const PLAN_STATUS_ACTIVE = 'ACTIVE';

    /**
     * The payment preferences for a subscription.
     *
     * @return PaymentPreferences|null
     */
    public function getPaymentPreferences(): ?PaymentPreferences
    {
        if (is_array($this->{self::PAYMENT_PREFERENCES}))
            $this->setPaymentPreferences(new PaymentPreferences($this->{self::PAYMENT_PREFERENCES}));

        return $this->{self::PAYMENT_PREFERENCES};
    }

    /**
     * The payment preferences for a subscription.
     *
     * @param PaymentPreferences $preferences
     * @return PlanRequest
     */
    public function setPaymentPreferences(PaymentPreferences $preferences): PlanRequest
    {
        $this->offsetSet(self::PAYMENT_PREFERENCES, $preferences);
        return $this;
    }

    /**
     * The tax details.
     *
     * @return Taxes|null
     */
    public function getTaxes(): ?Taxes
    {
        if (is_array($this->{self::TAXES}))
            $this->setTaxes(new Taxes($this->{self::TAXES}));

        return $this->{self::TAXES};
    }

    /**
     * The tax details.
     *
     * @param Taxes $taxes
     * @return PlanRequest
     */
    public function setTaxes(Taxes $taxes): PlanRequest
    {
        $this->offsetSet(self::TAXES, $taxes);
        return $this;
    }

    /**
     * The plan name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    /**
     * The plan name.
     *
     * @param string $name
     * @return PlanRequest
     * @throws ValueOutOfBoundsException
     */
    public function setName(string $name): PlanRequest
    {
        $length = strlen($name);
        if ($length < 1 || $length > 127) throw new ValueOutOfBoundsException($name);

        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    /**
     * The ID for the product.
     *
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->{self::PRODUCT_ID};
    }

    /**
     * The ID for the product.
     *
     * @param string $productId
     * @return PlanRequest
     * @throws ValueOutOfBoundsException
     */
    public function setProductId(string $productId): PlanRequest
    {
        $length = strlen($productId);
        if ($length < 6 || $length > 50) throw new ValueOutOfBoundsException($productId);

        $this->offsetSet(self::PRODUCT_ID, $productId);
        return $this;
    }

    /**
     * The detailed description of the plan.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * The detailed description of the plan.
     *
     * @param string $description
     * @return PlanRequest
     * @throws ValueOutOfBoundsException
     */
    public function setDescription(string $description): PlanRequest
    {
        $length = strlen($description);
        if ($length < 1 || $length > 127) throw new ValueOutOfBoundsException($description);

        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }

    /**
     * Indicates whether you can subscribe to this plan by providing a quantity for the goods or service.
     *
     * @return bool|null
     */
    public function getQuantitySupported(): ?bool
    {
        return $this->{self::QUANTITY_SUPPORTED};
    }

    /**
     * Indicates whether you can subscribe to this plan by providing a quantity for the goods or service.
     *
     * @param bool $supported
     * @return PlanRequest
     */
    public function setQuantitySupported(bool $supported): PlanRequest
    {
        $this->offsetSet(self::QUANTITY_SUPPORTED, $supported);
        return $this;
    }

    /**
     * The plan status.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    /**
     * The plan status.
     *
     * @param string $status
     * @return PlanRequest
     * @throws InvalidPlanStatusException
     */
    public function setStatus(string $status): PlanRequest
    {
        switch ($status)
        {
            case self::PLAN_STATUS_ACTIVE:
            case self::PLAN_STATUS_CREATED:
            case self::PLAN_STATUS_INACTIVE:
                $this->offsetSet(self::STATUS, $status);
                return $this;
        }

        throw new InvalidPlanStatusException($status);
    }
}

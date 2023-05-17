<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPatchObjectOperationException;
use Cloudcogs\PayPal\Exception\InvalidSubscriptionUpdateDataException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\DateTime;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Money;
use Cloudcogs\PayPal\Support\PatchObject;
use Cloudcogs\PayPal\Support\PaymentSource;
use Cloudcogs\PayPal\Support\PricingTier;
use Cloudcogs\PayPal\Support\ShippingDetail;
use Cloudcogs\PayPal\Support\TaxesOverride;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Updates a subscription which could be in ACTIVE or SUSPENDED status.
 * You can override plan level default attributes by providing customised values for plan path in the patch request.
 *   - You cannot update attributes that have already completed (Example - trial cycles can’t be updated if completed).
 *   - Once overridden, changes to plan resource will not impact subscription.
 *   - Any price update will not impact billing cycles within next 10 days (Applicable only for subscriptions funded by PayPal account).
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_patch
 */
class UpdateSubscription extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/subscriptions/';

    protected const SUBSCRIPTION_ID = 'subscription_id';
    protected const CUSTOM_ID = 'custom_id';
    protected const OUTSTANDING_BALANCE = 'billing_info.outstanding_balance';
    protected const BILLING_CYCLES_PRICING_SCHEME_FIXED_PRICE = 'plan.billing_cycles[@sequence==n].pricing_scheme.fixed_price';
    protected const BILLING_CYCLES_PRICING_SCHEME_TIERS = 'plan.billing_cycles[@sequence==n].pricing_scheme.tiers';
    protected const BILLING_CYCLES_TOTAL_CYCLES = 'plan.billing_cycles[@sequence==n].total_cycles';
    protected const PAYMENT_PREFERENCES_AUTO_BILL_OUTSTANDING = 'plan.payment_preferences.auto_bill_outstanding';
    protected const PAYMENT_PREFERENCES_PAYMENT_FAILURE_THRESHOLD = 'plan.payment_preferences.payment_failure_threshold';
    protected const PLAN_TAXES_INCLUSIVE = 'plan.taxes.inclusive';
    protected const PLAN_TAXES_PERCENTAGE = 'plan.taxes.percentage';
    protected const SHIPPING_AMOUNT = 'shipping_amount';
    protected const START_TIME = 'start_time';
    protected const SUBSCRIBER_SHIPPING_ADDRESS = 'subscriber.shipping_address';
    protected const SUBSCRIBER_PAYMENT_SOURCE = 'subscriber.payment_source';

    protected array $fixedPrices = [];
    protected array $tiers = [];
    protected array $total_cycles = [];
    protected array $updates = [];

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new UpdateSubscriptionResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.$this->getSubscriptionId();
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_PATCH;
    }

    /**
     * The ID for the subscription.
     *
     * @param string $subscriptionId
     * @return UpdateSubscription
     */
    public function setSubscriptionId(string $subscriptionId): UpdateSubscription
    {
        return $this->setParameter(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    public function getSubscriptionId(): string
    {
        return $this->getParameter(self::SUBSCRIPTION_ID);
    }

    public function setCustomId(string $customId): UpdateSubscription
    {
        return $this->setParameter(self::CUSTOM_ID, $customId);
    }

    public function getCustomId(): ?string
    {
        return $this->getParameter(self::CUSTOM_ID);
    }

    public function setOutstandingBalance(Money $outstandingBalance): UpdateSubscription
    {
        return $this->setParameter(self::OUTSTANDING_BALANCE, $outstandingBalance);
    }

    public function getOutstandingBalance(): ?Money
    {
        return $this->getParameter(self::OUTSTANDING_BALANCE);
    }

    public function setBillingCycleSequencePricingSchemeFixedPrice(int $sequence, Money $fixedPrice): UpdateSubscription
    {
        $this->fixedPrices[$sequence] = $fixedPrice;
        return $this;
    }

    public function getBillingCycleSequencePricingSchemeFixedPrice(int $sequence): ?Money
    {
        return @$this->fixedPrices[$sequence];
    }

    public function setPlanTaxes(TaxesOverride $taxes): UpdateSubscription
    {
        $this->setParameter(self::PLAN_TAXES_INCLUSIVE, $taxes->getInclusive());
        $this->setParameter(self::PLAN_TAXES_PERCENTAGE, $taxes->getPercentage());
        return $this;
    }

    public function getPlanTaxes(): ?TaxesOverride
    {
        $taxes = new TaxesOverride();
        if ($this->getParameter(self::PLAN_TAXES_INCLUSIVE) !== null)
            $taxes->setInclusive($this->getParameter(self::PLAN_TAXES_INCLUSIVE));

        if ($this->getParameter(self::PLAN_TAXES_PERCENTAGE) !== null)
            $taxes->setPercentage($this->getParameter(self::PLAN_TAXES_PERCENTAGE));

        return $taxes;
    }

    public function setShippingAmount(Money $shippingAmount): UpdateSubscription
    {
        return $this->setParameter(self::SHIPPING_AMOUNT, $shippingAmount);
    }

    public function getShippingAmount(): ?Money
    {
        return $this->getParameter(self::SHIPPING_AMOUNT);
    }

    public function setStartTime(DateTime $startTime): UpdateSubscription
    {
        return $this->setParameter(self::START_TIME, $startTime);
    }

    public function getStartTime(): ?DateTime
    {
        return $this->getParameter(self::START_TIME);
    }

    /**
     * @param int $sequence
     * @param PricingTier ...$tiers
     * @return $this
     */
    public function setBillingCycleSequencePricingSchemeTiers(int $sequence, PricingTier ...$tiers): UpdateSubscription
    {
        $this->tiers[$sequence] = $tiers;
        return $this;
    }

    public function getBillingCycleSequencePricingSchemeTiers(int $sequence): ?array
    {
        return @$this->tiers[$sequence];
    }

    public function setBillingCycleSequenceTotalCycles(int $sequence, int $totalCycles): UpdateSubscription
    {
        $this->total_cycles[$sequence] = $totalCycles;
        return $this;
    }

    public function getBillingCycleSequenceTotalCycles(int $sequence): ?int
    {
        return @$this->total_cycles[$sequence];
    }

    public function setAutoBillOutstanding(bool $autoBill): UpdateSubscription
    {
        return $this->setParameter(self::PAYMENT_PREFERENCES_AUTO_BILL_OUTSTANDING, $autoBill);
    }

    public function getAutoBillOutstanding(): ?bool
    {
        return $this->getParameter(self::PAYMENT_PREFERENCES_AUTO_BILL_OUTSTANDING);
    }

    public function setPaymentFailureThreshold(int $threshold): UpdateSubscription
    {
        return $this->setParameter(self::PAYMENT_PREFERENCES_PAYMENT_FAILURE_THRESHOLD, $threshold);
    }

    public function getPaymentFailureThreshold(): ?int
    {
        return $this->getParameter(self::PAYMENT_PREFERENCES_PAYMENT_FAILURE_THRESHOLD);
    }

    public function setShippingAddress(ShippingDetail $shippingAddress): UpdateSubscription
    {
        return $this->setParameter(self::SUBSCRIBER_SHIPPING_ADDRESS, $shippingAddress);
    }

    public function getShippingAddress(): ?ShippingDetail
    {
        return $this->getParameter(self::SUBSCRIBER_SHIPPING_ADDRESS);
    }

    public function setPaymentSource(PaymentSource $paymentSource): UpdateSubscription
    {
        return $this->setParameter(self::SUBSCRIBER_PAYMENT_SOURCE, $paymentSource);
    }

    public function getPaymentSource(): ?PaymentSource
    {
        return $this->getParameter(self::SUBSCRIBER_PAYMENT_SOURCE);
    }

    /**
     * @return string
     * @throws InvalidSubscriptionUpdateDataException
     * @throws AccessTokenNotFoundException
     * @throws InvalidPatchObjectOperationException|\JsonException
     */
    public function getData(): string
    {
        $this->includeAuthorization();

        // Outstanding Balance
        $outstandingBalance = $this->getOutstandingBalance();
        if ($outstandingBalance !== null)
        {
            $outstandingBalancePatch = new PatchObject();
            $outstandingBalancePatch
                ->setOperation(PatchObject::OP_REPLACE)
                ->setValue($outstandingBalance)
                ->setPath($this->getPath(self::OUTSTANDING_BALANCE));
            $this->updates[] = $outstandingBalancePatch;
        }

        // Custom Id
        $customId = $this->getCustomId();
        if ($customId !== null)
        {
            $customIdPatch = new PatchObject();
            $customIdPatch
                ->setOperation(PatchObject::OP_ADD)
                ->setValue($customId)
                ->setPath($this->getPath(self::CUSTOM_ID));
            $this->updates[] = $customIdPatch;
        }

        // Fixed price(s)
        if (!empty($this->fixedPrices))
        {
            foreach($this->fixedPrices as $sequence => $fixedPrice)
            {
                $fixedPricePatch = new PatchObject();
                $fixedPricePatch
                    ->setOperation(PatchObject::OP_ADD)
                    ->setValue($fixedPrice)
                    ->setPath($this->getPath(self::BILLING_CYCLES_PRICING_SCHEME_FIXED_PRICE, $sequence));
                $this->updates[] = $fixedPricePatch;
            }
        }

        // Tiers
        if (!empty($this->tiers))
        {
            foreach ($this->tiers as $sequence => $tier)
            {
                $tierPatch = new PatchObject();
                $tierPatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($tier)
                    ->setPath($this->getPath(self::BILLING_CYCLES_PRICING_SCHEME_TIERS, $sequence));
                $this->updates[] = $tierPatch;
            }
        }

        // Total cycles
        if (!empty($this->total_cycles))
        {
            foreach ($this->total_cycles as $sequence => $total_cycle)
            {
                $totalCyclePatch = new PatchObject();
                $totalCyclePatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($total_cycle)
                    ->setPath($this->getPath(self::BILLING_CYCLES_TOTAL_CYCLES, $sequence));
                $this->updates[] = $totalCyclePatch;
            }
        }

        // Auto bill outstanding
        $autoBill = $this->getAutoBillOutstanding();
        if ($autoBill !== null)
        {
            $autoBillPatch = new PatchObject();
            $autoBillPatch
                ->setOperation(PatchObject::OP_REPLACE)
                ->setValue($autoBill)
                ->setPath($this->getPath(self::PAYMENT_PREFERENCES_AUTO_BILL_OUTSTANDING));
            $this->updates[] = $autoBillPatch;
        }

        // Payment failure threshold
        $paymentFailure = $this->getPaymentFailureThreshold();
        if ($paymentFailure !== null)
        {
            $paymentFailurePatch = new PatchObject();
            $paymentFailurePatch
                ->setOperation(PatchObject::OP_REPLACE)
                ->setValue($paymentFailure)
                ->setPath($this->getPath(self::PAYMENT_PREFERENCES_PAYMENT_FAILURE_THRESHOLD));
            $this->updates[] = $paymentFailurePatch;
        }

        // Taxes
        $taxes = $this->getPlanTaxes();
        if ($taxes !== null)
        {
            if($taxes->getInclusive() !== null) {
                $taxesInclusivePatch = new PatchObject();
                $taxesInclusivePatch
                    ->setOperation(PatchObject::OP_ADD)
                    ->setValue($taxes->getInclusive())
                    ->setPath($this->getPath(self::PLAN_TAXES_INCLUSIVE));
                $this->updates[] = $taxesInclusivePatch;
            }

            if($taxes->getPercentage() !== null) {
                $taxesPercentagePatch = new PatchObject();
                $taxesPercentagePatch
                    ->setOperation(PatchObject::OP_ADD)
                    ->setValue($taxes->getPercentage())
                    ->setPath($this->getPath(self::PLAN_TAXES_PERCENTAGE));
                $this->updates[] = $taxesPercentagePatch;
            }
        }

        // Shipping amount
        $shippingAmount = $this->getShippingAmount();
        if ($shippingAmount !== null)
        {
            $shippingAmountPatch = new PatchObject();
            $shippingAmountPatch
                ->setOperation(PatchObject::OP_ADD)
                ->setValue($shippingAmount)
                ->setPath($this->getPath(self::SHIPPING_AMOUNT));
            $this->updates[] = $shippingAmountPatch;
        }

        // Start Time
        $startTime = $this->getStartTime();
        if ($startTime !== null)
        {
            $startTimePatch = new PatchObject();
            $startTimePatch
                ->setOperation(PatchObject::OP_REPLACE)
                ->setValue($startTime)
                ->setPath($this->getPath(self::START_TIME));
            $this->updates[] = $startTimePatch;
        }

        // Subscriber shipping
        $shippingAddress = $this->getShippingAddress();
        if ($shippingAddress !== null)
        {
            $shippingAddressPatch = new PatchObject();
            $shippingAddressPatch
                ->setOperation(PatchObject::OP_ADD)
                ->setValue($shippingAddress)
                ->setPath($this->getPath(self::SUBSCRIBER_SHIPPING_ADDRESS));
            $this->updates[] = $shippingAddressPatch;
        }

        // Subscriber Payment source
        $paymentSource = $this->getPaymentSource();
        if ($paymentSource !== null)
        {
            $paymentSourcePatch = new PatchObject();
            $paymentSourcePatch
                ->setOperation(PatchObject::OP_REPLACE)
                ->setValue($paymentSource)
                ->setPath($this->getPath(self::SUBSCRIBER_PAYMENT_SOURCE));
            $this->updates[] = $paymentSourcePatch;
        }

        if (empty($this->updates))
            throw new InvalidSubscriptionUpdateDataException();

        return (new JsonSerializableArrayObject())->toJsonString($this->updates);
    }

    protected function getPath(string $path, ?int $sequence = null): string
    {
        return "/".str_replace(["==n",".","[","]"], ["==$sequence","/","/",""], $path);
    }
}

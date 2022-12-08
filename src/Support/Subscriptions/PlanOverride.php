<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\PaymentPreferencesOverride;
use Cloudcogs\PayPal\Support\TaxesOverride;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-plan_override
 */
class PlanOverride extends AbstractPlan
{
    /**
     * An array of billing cycles for trial billing and regular billing.
     * The subscription billing cycle definition has to adhere to the plan billing cycle definition.
     *
     * @return array|null
     */
    public function getBillingCycles(): ?array
    {
        $billingCycles = $this->{self::BILLING_CYCLES};
        if (is_array($billingCycles))
        {
            foreach ($billingCycles as $i => $billingCycle)
            {
                if (is_array($billingCycle))
                    $billingCycles[$i] = new BillingCycleOverride($billingCycle);
            }

            $this->setBillingCycles($billingCycles);
        }

        return $billingCycles;
    }

    /**
     * Convenience method (not defined in PayPal's API). Used to add a BillingCycleOverride object to the billing_cycles array
     *
     * @param BillingCycleOverride $billingCycleOverride
     * @return $this
     */
    public function addBillingCycle(BillingCycleOverride $billingCycleOverride): PlanOverride
    {
        $list = $this->getBillingCycles() ?? [];
        $list[] = $billingCycleOverride;

        return $this->setBillingCycles($list);
    }

    /**
     * The payment preferences to override at subscription level.
     *
     * @return PaymentPreferencesOverride|null
     */
    public function getPaymentPreferences(): ?PaymentPreferencesOverride
    {
        $preferences = $this->{self::PAYMENT_PREFERENCES};
        if (is_array($preferences))
            $this->setPaymentPreferences(new PaymentPreferencesOverride($preferences));

        return $this->{self::PAYMENT_PREFERENCES};
    }

    /**
     * @param PaymentPreferencesOverride $paymentPreferences The payment preferences to override at subscription level.
     * @return PlanOverride
     */
    public function setPaymentPreferences(PaymentPreferencesOverride $paymentPreferences): PlanOverride
    {
        $this->offsetSet(self::PAYMENT_PREFERENCES, $paymentPreferences);
        return $this;
    }

    /**
     * The tax details.
     *
     * @return TaxesOverride|null
     */
    public function getTaxes(): ?TaxesOverride
    {
        $taxes = $this->{self::TAXES};
        if (is_array($taxes))
            $this->setTaxes(new TaxesOverride($taxes));

        return $this->{self::TAXES};
    }

    /**
     * @param TaxesOverride $taxes The tax details.
     * @return $this
     */
    public function setTaxes(TaxesOverride $taxes): PlanOverride
    {
        $this->offsetSet(self::TAXES, $taxes);
        return $this;
    }
}

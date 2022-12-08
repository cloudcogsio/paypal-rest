<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\FailedPaymentDetails;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\LastPaymentDetails;
use Cloudcogs\PayPal\Support\Money;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-subscription_billing_info
 */
class SubscriptionBillingInfo extends JsonSerializableArrayObject
{
    protected const FAILED_PAYMENTS_COUNT = 'failed_payments_count';
    protected const OUTSTANDING_BALANCE = 'outstanding_balance';
    protected const CYCLE_EXECUTIONS = 'cycle_executions';
    protected const FINAL_PAYMENT_TIME = 'final_payment_time';
    protected const LAST_FAILED_PAYMENT = 'last_failed_payment';
    protected const LAST_PAYMENT = 'last_payment';
    protected const NEXT_BILLING_TIME = 'next_billing_time';

    /**
     * The number of consecutive payment failures.
     * Resets to 0 after a successful payment.
     * If this reaches the payment_failure_threshold value, the subscription updates to the SUSPENDED state.
     *
     * @return int
     */
    public function getFailedPaymentsCount(): int
    {
        return intval($this->{self::FAILED_PAYMENTS_COUNT});
    }

    /**
     * The total pending bill amount, to be paid by the subscriber.
     *
     * @return Money|null
     */
    public function getOutstandingBalance(): ?Money
    {
        $balance = $this->{self::OUTSTANDING_BALANCE};
        if (is_array($balance))
            $this->offsetSet(self::OUTSTANDING_BALANCE, new Money($balance));

        return $this->{self::OUTSTANDING_BALANCE};
    }

    /**
     * The trial and regular billing executions.
     * @return array
     */
    public function getCycleExecutions(): array
    {
        $cycles = $this->{self::CYCLE_EXECUTIONS};
        if (is_array($cycles))
        {
            foreach ($cycles as $i=>$cycle)
            {
                if ($cycle instanceof CycleExecution) {
                    reset($cycles);
                    return $cycles;
                }

                $cycles[$i] = new CycleExecution($cycle);
            }

            $this->offsetSet(self::CYCLE_EXECUTIONS, $cycles);
        }
        reset($cycles);
        return $cycles;
    }

    /**
     * The date and time when the final billing cycle occurs, in Internet date and time format
     *
     * @return string|null
     */
    public function getFinalPaymentTime(): ?string
    {
        return $this->{self::FINAL_PAYMENT_TIME};
    }

    /**
     * The details for the last failed payment of the subscription.
     *
     * @return FailedPaymentDetails|null
     */
    public function getLastFailedPayment(): ?FailedPaymentDetails
    {
        $details = $this->{self::LAST_FAILED_PAYMENT};
        if (is_array($details))
            $this->offsetSet(self::LAST_FAILED_PAYMENT, new FailedPaymentDetails($details));

        return $this->{self::LAST_FAILED_PAYMENT};
    }

    /**
     * The details for the last payment of the subscription.
     *
     * @return LastPaymentDetails|null
     */
    public function getLastPayment(): ?LastPaymentDetails
    {
        $details = $this->{self::LAST_PAYMENT};
        if (is_array($details))
            $this->offsetSet(self::LAST_PAYMENT, new LastPaymentDetails($details));

        return $this->{self::LAST_PAYMENT};
    }

    /**
     * The next date and time for billing this subscription, in Internet date and time format
     *
     * @return string|null
     */
    public function getNextBillingTime(): ?string
    {
        return $this->{self::NEXT_BILLING_TIME};
    }
}

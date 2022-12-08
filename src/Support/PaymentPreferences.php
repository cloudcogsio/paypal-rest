<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\InvalidSetupFeeFailureActionException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-payment_preferences
 */
class PaymentPreferences extends JsonSerializableArrayObject
{
    protected const AUTO_BILL_OUTSTANDING = 'auto_bill_outstanding';
    protected const PAYMENT_FAILURE_THRESHOLD = 'payment_failure_threshold';
    protected const SETUP_FEE = 'setup_fee';
    protected const SETUP_FEE_FAILURE_ACTION = 'setup_fee_failure_action';

    const SETUP_FEE_FAILURE_CONTINUE = 'CONTINUE';
    const SETUP_FEE_FAILURE_CANCEL = 'CANCEL';

    /**
     * Indicates whether to automatically bill the outstanding amount in the next billing cycle.
     *
     * @return string|null
     */
    public function getAutoBillOutstanding(): ?string
    {
        return ($this->{self::AUTO_BILL_OUTSTANDING}) ? 'true' : 'false';
    }

    /**
     * Indicates whether to automatically bill the outstanding amount in the next billing cycle.
     *
     * @param bool $autoBill
     * @return $this
     */
    public function setAutoBillOutstanding(bool $autoBill): PaymentPreferences
    {
        $this->offsetSet(self::AUTO_BILL_OUTSTANDING, $autoBill);

        return $this;
    }

    /**
     * The maximum number of payment failures before a subscription is suspended.
     *
     * @return int|null
     */
    public function getPaymentFailureThreshold(): ?int
    {
        return $this->{self::PAYMENT_FAILURE_THRESHOLD};
    }

    /**
     * The maximum number of payment failures before a subscription is suspended.
     * For example, if payment_failure_threshold is 2, the subscription automatically updates to the SUSPEND state
     * if two consecutive payments fail.
     *
     * Maximum value: 999.
     *
     * @param int $threshold
     * @return $this
     */
    public function setPaymentFailureThreshold(int $threshold): PaymentPreferences
    {
        if ($threshold < 0) $threshold = 0;
        $this->offsetSet(self::PAYMENT_FAILURE_THRESHOLD, $threshold);

        return $this;
    }

    /**
     * The initial set-up fee for the service.
     *
     * @return Money|null
     */
    public function getSetupFee(): ?Money
    {
        if (is_array($this->{self::SETUP_FEE}))
            $this->setSetupFee(new Money($this->{self::SETUP_FEE}));

        return $this->{self::SETUP_FEE};
    }

    /**
     * The initial set-up fee for the service.
     *
     * @param Money $setupFee
     * @return $this
     */
    public function setSetupFee(Money $setupFee): PaymentPreferences
    {
        $this->offsetSet(self::SETUP_FEE, $setupFee);
        return $this;
    }

    /**
     * The action to take on the subscription if the initial payment for the setup fails.
     *
     * @return string|null
     */
    public function getSetupFeeFailureAction(): ?string
    {
        return $this->{self::SETUP_FEE_FAILURE_ACTION};
    }

    /**
     * The action to take on the subscription if the initial payment for the setup fails.
     * The possible values are:
     *  CONTINUE. Continues the subscription if the initial payment for the setup fails.
     *  CANCEL. Cancels the subscription if the initial payment for the setup fails.
     *
     * @param string $failureAction
     * @return $this
     * @throws InvalidSetupFeeFailureActionException
     */
    public function setSetupFeeFailureAction(string $failureAction): PaymentPreferences
    {
        switch ($failureAction)
        {
            case self::SETUP_FEE_FAILURE_CANCEL:
            case self::SETUP_FEE_FAILURE_CONTINUE:
                $this->offsetSet(self::SETUP_FEE_FAILURE_ACTION, $failureAction);
                return $this;
        }

        throw new InvalidSetupFeeFailureActionException($failureAction);
    }
}

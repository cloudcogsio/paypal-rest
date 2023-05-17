<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPatchObjectOperationException;
use Cloudcogs\PayPal\Exception\InvalidPlanUpdateDataException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\PatchObject;
use Cloudcogs\PayPal\Support\PaymentPreferences;
use Cloudcogs\PayPal\Support\Taxes;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Updates a plan with the CREATED or ACTIVE status. For an INACTIVE plan, you can make only status updates.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_patch
 */
class UpdatePlan extends AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans/';

    protected const PLAN_ID = 'plan_id';
    protected const DESCRIPTION = 'description';
    protected const TAXES_PERCENTAGE = 'taxes.percentage';
    protected const PAYMENT_PREFERENCES = 'payment_preferences';

    protected array $updates = [];

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new UpdatePlanResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.$this->getPlanId();
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_PATCH;
    }

    /**
     * The ID of the plan.
     *
     * @param string $planId
     * @return UpdatePlan
     */
    public function setPlanId(string $planId): UpdatePlan
    {
        return $this->setParameter(self::PLAN_ID, $planId);
    }

    public function getPlanId(): string
    {
        return $this->getParameter(self::PLAN_ID);
    }

    public function setPlanDescription(string $description): UpdatePlan
    {
        return $this->setParameter(self::DESCRIPTION, $description);
    }

    public function getPlanDescription(): ?string
    {
        return $this->getParameter(self::DESCRIPTION);
    }

    public function setTaxes(Taxes $tax): UpdatePlan
    {
        return $this->setParameter(self::TAXES_PERCENTAGE, $tax);
    }

    public function getTaxes(): ?Taxes
    {
        return $this->getParameter(self::TAXES_PERCENTAGE);
    }

    public function setPaymentPreferences(PaymentPreferences $preferences): UpdatePlan
    {
        return $this->setParameter(self::PAYMENT_PREFERENCES, $preferences);
    }

    public function getPaymentPreferences(): ?PaymentPreferences
    {
        return $this->getParameter(self::PAYMENT_PREFERENCES);
    }

    /**
     * @inheritDoc
     * @return string
     * @throws AccessTokenNotFoundException
     * @throws InvalidPlanUpdateDataException
     * @throws InvalidPatchObjectOperationException
     * @throws \JsonException
     */
    public function getData()
    {
        $this->includeAuthorization();

        // Descr
        $descr = $this->getPlanDescription();
        if ($descr !== null)
        {
            $descrPatch = new PatchObject();
            $descrPatch
                ->setOperation(PatchObject::OP_ADD)
                ->setValue($descr)
                ->setPath('/description');
            $this->updates[] = $descrPatch;
        }

        // Taxes Percent
        $taxes = $this->getTaxes();
        if ($taxes !== null)
        {
            $taxesPercentagePatch = new PatchObject();
            $taxesPercentagePatch
                ->setOperation(PatchObject::OP_ADD)
                ->setValue($taxes->getPercentage())
                ->setPath('/taxes/percentage');
            $this->updates[] = $taxesPercentagePatch;
        }

        // Payment Preferences
        $paymentPreferences = $this->getPaymentPreferences();
        if ($paymentPreferences !== null)
        {
            // auto bill outstanding
            if ($paymentPreferences->getAutoBillOutstanding() !== null)
            {
                $autoBillPatch = new PatchObject();
                $autoBillPatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($paymentPreferences->getAutoBillOutstanding())
                    ->setPath('/payment_preferences/auto_bill_outstanding');
                $this->updates[] = $autoBillPatch;
            }

            // payment failure threshold
            if ($paymentPreferences->getPaymentFailureThreshold() !== null)
            {
                $thresholdPatch = new PatchObject();
                $thresholdPatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($paymentPreferences->getPaymentFailureThreshold())
                    ->setPath('/payment_preferences/payment_failure_threshold');
                $this->updates[] = $thresholdPatch;
            }

            // setup fee
            if ($paymentPreferences->getSetupFee() !== null)
            {
                $setupFeePatch = new PatchObject();
                $setupFeePatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($paymentPreferences->getSetupFee())
                    ->setPath('/payment_preferences/setup_fee');
                $this->updates[] = $setupFeePatch;
            }

            // setup fee failure action
            if ($paymentPreferences->getSetupFeeFailureAction() !== null)
            {
                $setupFeeFailurePatch = new PatchObject();
                $setupFeeFailurePatch
                    ->setOperation(PatchObject::OP_REPLACE)
                    ->setValue($paymentPreferences->getSetupFeeFailureAction())
                    ->setPath('/payment_preferences/setup_fee_failure_action');
                $this->updates[] = $setupFeeFailurePatch;
            }
        }

        if (empty($this->updates))
            throw new InvalidPlanUpdateDataException();

        return (new JsonSerializableArrayObject())->toJsonString($this->updates);
    }
}

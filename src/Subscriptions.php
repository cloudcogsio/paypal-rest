<?php

namespace Cloudcogs\PayPal;

use Cloudcogs\PayPal\Message\Subscriptions\ActivatePlan;
use Cloudcogs\PayPal\Message\Subscriptions\ActivateSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\CancelSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\CaptureAuthorizedPaymentOnSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\CreatePlan;
use Cloudcogs\PayPal\Message\Subscriptions\CreateSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\DeactivatePlan;
use Cloudcogs\PayPal\Message\Subscriptions\ListPlans;
use Cloudcogs\PayPal\Message\Subscriptions\ListTransactionsForSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\RevisePlanOrQuantityOfSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\ShowPlanDetails;
use Cloudcogs\PayPal\Message\Subscriptions\ShowSubscriptionDetails;
use Cloudcogs\PayPal\Message\Subscriptions\SuspendSubscription;
use Cloudcogs\PayPal\Message\Subscriptions\UpdatePlan;
use Cloudcogs\PayPal\Message\Subscriptions\UpdatePricing;
use Cloudcogs\PayPal\Message\Subscriptions\UpdateSubscription;
use Cloudcogs\PayPal\Support\Subscriptions\PlanRequest;
use Cloudcogs\PayPal\Support\Subscriptions\RevisedSubscriptionRequest;
use Cloudcogs\PayPal\Support\Subscriptions\SubscriptionRequest;

class Subscriptions extends RestGateway
{
    /******************** SUBSCRIPTIONS *******************/

    /**
     * List billing plans
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_list
     * @param array $parameters
     * @return ListPlans
     */
    public function ListPlans(array $parameters = ['pageNumber' => 1, 'pageSize' => 10, 'totalPagesRequired' => true]): ListPlans
    {
        /** @var $request ListPlans */
        $request = $this->createRequest(ListPlans::class, $parameters);

        return $request->setGateway($this);
    }

    /**
     * Creates a plan that defines pricing and billing cycle details for subscriptions.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_create
     * @param PlanRequest|null $plan
     * @return CreatePlan
     */
    public function CreatePlan(?PlanRequest $plan = null): CreatePlan
    {
        /** @var $request CreatePlan */
        $request = $this->createRequest(CreatePlan::class, []);
        $request->Plan($plan);

        return $request->setGateway($this);
    }

    /**
     * Updates a plan with the CREATED or ACTIVE status. For an INACTIVE plan, you can make only status updates.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_patch
     * @param string $planId
     * @param array $parameters
     * @return UpdatePlan
     */
    public function UpdatePlan(string $planId, array $parameters = []): UpdatePlan
    {
        /** @var $request UpdatePlan */
        $request = $this->createRequest(UpdatePlan::class, $parameters);
        $request->setPlanId($planId);

        return $request->setGateway($this);
    }

    /**
     * Shows details for a plan, by ID.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_get
     * @param string $planId
     * @return ShowPlanDetails
     */
    public function ShowPlanDetails(string $planId): ShowPlanDetails
    {
        /** @var $request ShowPlanDetails */
        $request = $this->createRequest(ShowPlanDetails::class, []);
        $request->setPlanId($planId);

        return $request->setGateway($this);
    }

    /**
     * Activates a plan, by ID.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_activate
     * @param string $planId
     * @return ActivatePlan
     */
    public function ActivatePlan(string $planId): ActivatePlan
    {
        /** @var $request ActivatePlan */
        $request = $this->createRequest(ActivatePlan::class, []);
        $request->setPlanId($planId);

        return $request->setGateway($this);
    }

    /**
     * Deactivates a plan, by ID.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_deactivate
     * @param string $planId
     * @return DeactivatePlan
     */
    public function DeactivatePlan(string $planId): DeactivatePlan
    {
        /** @var $request DeactivatePlan */
        $request = $this->createRequest(DeactivatePlan::class, []);
        $request->setPlanId($planId);

        return $request->setGateway($this);
    }

    /**
     * Updates pricing for a plan. For example, you can update a regular billing cycle from $5 per month to $7 per month.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_update-pricing-schemes
     * @param string $planId
     * @param array $parameters
     * @return UpdatePricing
     */
    public function UpdatePricing(string $planId, array $parameters = []): UpdatePricing
    {
        /** @var $request UpdatePricing */
        $request = $this->createRequest(UpdatePricing::class, $parameters);
        $request->setPlanId($planId);

        return $request->setGateway($this);
    }

    /**
     * Creates a subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_create
     * @param SubscriptionRequest|null $subscription
     * @return CreateSubscription
     */
    public function CreateSubscription(?SubscriptionRequest $subscription = null): CreateSubscription
    {
        /** @var $request CreateSubscription */
        $request = $this->createRequest(CreateSubscription::class, []);

        return $request->setGateway($this);
    }

    /**
     * Updates a subscription which could be in ACTIVE or SUSPENDED status.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_patch
     * @param string $subscriptionId
     * @param array $parameters
     * @return UpdateSubscription
     */
    public function UpdateSubscription(string $subscriptionId, array $parameters = []): UpdateSubscription
    {
        /** @var $request UpdateSubscription */
        $request = $this->createRequest(UpdateSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Shows details for a subscription, by ID.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_get
     *
     * @param string $subscriptionId
     * @param array $parameters
     * @return ShowSubscriptionDetails
     */
    public function ShowSubscriptionDetails(string $subscriptionId, array $parameters = []): ShowSubscriptionDetails
    {
        /** @var $request ShowSubscriptionDetails */
        $request = $this->createRequest(ShowSubscriptionDetails::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Activates the subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_activate
     * @param string $subscriptionId
     * @param array $parameters
     * @return ActivateSubscription
     */
    public function ActivateSubscription(string $subscriptionId, array $parameters = []): ActivateSubscription
    {
        /** @var $request ActivateSubscription */
        $request = $this->createRequest(ActivateSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Suspends the subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_suspend
     * @param string $subscriptionId
     * @param array $parameters
     * @return SuspendSubscription
     */
    public function SuspendSubscription(string $subscriptionId, array $parameters = []): SuspendSubscription
    {
        /** @var $request SuspendSubscription */
        $request = $this->createRequest(SuspendSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Cancels the subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_cancel
     * @param string $subscriptionId
     * @param array $parameters
     * @return CancelSubscription
     */
    public function CancelSubscription(string $subscriptionId, array $parameters = []): CancelSubscription
    {
        /** @var $request CancelSubscription */
        $request = $this->createRequest(CancelSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Captures an authorized payment from the subscriber on the subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_capture
     * @param string $subscriptionId
     * @param array $parameters
     * @return CaptureAuthorizedPaymentOnSubscription
     */
    public function CaptureAuthorizedPaymentOnSubscription(string $subscriptionId, array $parameters = []): CaptureAuthorizedPaymentOnSubscription
    {
        /** @var $request CaptureAuthorizedPaymentOnSubscription */
        $request = $this->createRequest(CaptureAuthorizedPaymentOnSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }

    /**
     * Updates the quantity of the product or service in a subscription.
     * You can also use this method to switch the plan and update the shipping_amount, shipping_address values for the subscription.
     * This type of update requires the buyer's consent.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_revise
     * @param string $subscriptionId
     * @param RevisedSubscriptionRequest $revisedSubscriptionRequest
     * @return RevisePlanOrQuantityOfSubscription
     */
    public function RevisePlanOrQuantityOfSubscription(string $subscriptionId, RevisedSubscriptionRequest $revisedSubscriptionRequest): RevisePlanOrQuantityOfSubscription
    {
        /** @var $request RevisePlanOrQuantityOfSubscription */
        $request = $this->createRequest(RevisePlanOrQuantityOfSubscription::class, []);
        $request
            ->setSubscriptionId($subscriptionId)
            ->setRevisedSubscriptionRequest($revisedSubscriptionRequest);

        return $request->setGateway($this);
    }

    /**
     * Lists transactions for a subscription.
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_transactions
     * @param string $subscriptionId
     * @param array $parameters
     * @return ListTransactionsForSubscription
     */
    public function ListTransactionsForSubscriptions(string $subscriptionId, array $parameters = []): ListTransactionsForSubscription
    {
        /** @var $request ListTransactionsForSubscription */
        $request = $this->createRequest(ListTransactionsForSubscription::class, $parameters);
        $request->setSubscriptionId($subscriptionId);

        return $request->setGateway($this);
    }
}
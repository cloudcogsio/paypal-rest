<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractCollectionRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * List plans
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#plans_list
 */
class ListPlans extends AbstractCollectionRequest
{
    const ENDPOINT = '/v1/billing/plans';

    protected const PLAN_IDS = 'plan_ids';
    protected const PRODUCT_ID = 'product_id';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ListPlansResponse($this, $response);
    }

    public function getPlanIds(): ?string
    {
        return $this->getParameter(self::PLAN_IDS);
    }

    /**
     * NOTE:
     * This filter seems to be broken. The API (https://developer.paypal.com/docs/api/subscriptions/v1/#plans_list)
     * specifies a string supporting up to 10 plan ids, but does not specify or give an example of the string or
     * how to separate the plan ids provided.
     * Providing a single plan id also has no effect on the response. Comma and space separated list of plan ids
     * also do not work to filter the results.
     *
     * This method is included here for completeness.
     *
     * @param string $planIds
     * @return ListPlans
     */
    public function setPlanIds(string $planIds): ListPlans
    {
        return $this->setParameter(self::PLAN_IDS, $planIds);
    }

    public function getProductId(): ?string
    {
        return $this->getParameter(self::PRODUCT_ID);
    }

    /**
     * Filters the response by a Product ID.
     *
     * @param string $productId
     * @return ListPlans
     */
    public function setProductId(string $productId): ListPlans
    {
        return $this->setParameter(self::PRODUCT_ID, $productId);
    }

    public function getEndpoint(): string
    {
        $queryParams = [
            self::PARAM_PAGE => $this->getPageNumber(),
            self::PARAM_PAGE_SIZE => $this->getPageSize(),
            self::PARAM_TOTAL_REQUIRED => $this->getTotalPagesRequired()
        ];

        // Optionally include plan ids filter
        $planIds = $this->getPlanIds();
        if ($planIds != null)
            $queryParams[self::PLAN_IDS] = $planIds;

        // Optionally include product id filter
        $productId = $this->getProductId();
        if ($productId != null)
            $queryParams[self::PRODUCT_ID] = $productId;

        return self::ENDPOINT.'?'.http_build_query($queryParams,'', '&');
    }
}

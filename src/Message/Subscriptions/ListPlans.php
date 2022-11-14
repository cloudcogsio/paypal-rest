<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

class ListPlans extends \Cloudcogs\PayPal\Message\AbstractRequest
{
    const ENDPOINT = '/v1/billing/plans';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        // TODO: Implement handleResponse() method.
    }

    public function getEndpoint(): string
    {
        // TODO: Implement getEndpoint() method.
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
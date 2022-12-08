<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Message\AbstractCollectionRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * List products
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_list
 */
class ListProducts extends AbstractCollectionRequest
{
    const ENDPOINT = '/v1/catalogs/products';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ListProductsResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.'?'.http_build_query([
                self::PARAM_PAGE => $this->getPageNumber(),
                self::PARAM_PAGE_SIZE => $this->getPageSize(),
                self::PARAM_TOTAL_REQUIRED => $this->getTotalPagesRequired()
            ],'', '&');
    }
}

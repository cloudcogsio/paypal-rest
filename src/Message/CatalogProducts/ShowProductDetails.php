<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Shows details for a product, by ID.
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_get
 */
class ShowProductDetails extends AbstractRequest
{
    const ENDPOINT = '/v1/catalogs/products/';

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ShowProductDetailsResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.$this->getProductId();
    }

    /**
     * @return null
     * @throws AccessTokenNotFoundException
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function getProductId(): string
    {
        return $this->getParameter(UpdateProduct::PARAM_PRODUCT_ID);
    }

    public function setProductId(string $id): ShowProductDetails
    {
        return $this->setParameter(UpdateProduct::PARAM_PRODUCT_ID, $id);
    }
}

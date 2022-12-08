<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Constants;
use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPreferRepresentationException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\ProductRequest;
use Omnipay\Common\Http\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Create a Product
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_create
 */
class CreateProduct extends AbstractRequest
{
    const ENDPOINT = '/v1/catalogs/products';

    protected ProductRequest $product;

    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->product = new ProductRequest();
    }

    function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new CreateProductResponse($this, $response);
    }

    function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @inheritDoc
     * @throws \JsonException
     * @throws AccessTokenNotFoundException
     * @throws InvalidPreferRepresentationException
     */
    public function getData()
    {
        $this->setPreferRepresentation(Constants::PAYPAL_PREFER_REPRESENTATION_DETAILED);
        $this->includeAuthorization();
        return $this->product->toJsonString();
    }

    /**
     * Set a product to be created or configure the default product instance created when this class was instantiated.
     * Eg.
     * $product = new ProductRequest([...]);
     * $Gateway->CreateProduct($product);
     *
     * OR
     *
     * $Gateway->CreateProduct()->setName('Test Product');
     *
     * @param ProductRequest|null $product
     * @return ProductRequest
     */
    public function Product(?ProductRequest $product = null): ProductRequest
    {
        if ($product != null)
            $this->product = $product;

        return $this->product;
    }
}

<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;
use Omnipay\Common\Http\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class CreateProduct extends AbstractRequest
{
    const ENDPOINT = '/v1/catalogs/products';

    protected Product $product;

    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->product = new Product();
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
     */
    public function getData()
    {
        $this->includeAuthorization();
        return $this->product->toJsonString();
    }

    /**
     * Set a product to be created or configure the default product instance created when this class was instantiated.
     * Eg.
     * $product = new Product([...]);
     * $Gateway->CreateProduct($product);
     *
     * OR
     *
     * $Gateway->CreateProduct()->setName('Test Product');
     *
     * @param Product|null $product
     * @return Product
     */
    public function Product(?Product $product = null): Product
    {
        if ($product != null)
            $this->product = $product;

        return $this->product;
    }
}

<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;

/**
 * CreateProduct response handler class
 */
class CreateProductResponse extends AbstractResponse
{
    protected Product $createdProduct;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return ($this->getHttpResponse()->getStatusCode() == 201 || $this->getHttpResponse()->getStatusCode() == 200);
    }

    /**
     * Return the created product
     *
     * @return Product|null
     * @throws UnsuccessfulResponseException
     */
    public function getCreatedProduct(): ?Product
    {
        if ($this->isSuccessful())
            return $this->createdProduct ?? $this->createdProduct = new Product($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

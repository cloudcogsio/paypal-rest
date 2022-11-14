<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;

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

    public function getCreatedProduct(): ?Product
    {
        if ($this->isSuccessful())
            return $this->createdProduct ?? $this->createdProduct = new Product($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

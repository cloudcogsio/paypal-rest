<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;

class CreateProductResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return ($this->getHttpResponse()->getStatusCode() == 201 || $this->getHttpResponse()->getStatusCode() == 200);
    }

    public function getCreatedProduct(): ?Product
    {
        $data = $this->getData();
        if (is_array($data)) return new Product($data);

        return null;
    }
}
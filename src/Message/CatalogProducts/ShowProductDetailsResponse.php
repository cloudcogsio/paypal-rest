<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;

/**
 * ShowProductDetails response handler
 */
class ShowProductDetailsResponse extends AbstractResponse
{
    protected Product $product;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @return Product
     * @throws UnsuccessfulResponseException
     */
    public function getProduct(): Product
    {
        if ($this->isSuccessful())
            return $this->product ?? $this->product = new Product($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

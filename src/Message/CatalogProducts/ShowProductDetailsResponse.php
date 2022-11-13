<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;

class ShowProductDetailsResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    public function getProduct(): Product
    {
        if ($this->isSuccessful())
            return new Product($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

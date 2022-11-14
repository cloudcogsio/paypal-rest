<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\ProductCollection;

class ListProductsResponse extends AbstractResponse
{
    protected ProductCollection $productCollection;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    /**
     * @return ProductCollection
     * @throws UnsuccessfulResponseException
     */
    public function getProductList(): ProductCollection
    {
        if ($this->isSuccessful())
            return $this->productCollection ?? $this->productCollection = new ProductCollection($this->getData());

        throw new UnsuccessfulResponseException();
    }
}

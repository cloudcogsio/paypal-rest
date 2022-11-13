<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Message\EmptyResponse;

class UpdateProductResponse extends EmptyResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 204;
    }
}

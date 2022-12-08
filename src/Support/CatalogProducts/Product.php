<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

/**
 * Class returned by ShowProductDetails
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#definition-product
 */
class Product extends AbstractProduct
{
    protected const UPDATE_TIME = 'update_time';

    /**
     * @throws \Exception
     */
    public function getUpdateTime(): ?string
    {
        return $this->{self::UPDATE_TIME};
    }
}

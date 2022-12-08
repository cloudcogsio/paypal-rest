<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Support\AbstractCollection;

/**
 * A collection of products
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#definition-product_collection
 */
class ProductCollection extends AbstractCollection
{
    protected const PRODUCTS = 'products';

    /**
     * @return array|null An array of products.
     */
    protected function getProducts(): ?array
    {
        $products = $this->{self::PRODUCTS};
        if (is_array($products))
        {
            foreach ($products as $i => $product)
            {
                if (is_array($product))
                    $products[$i] = new ProductCollectionElement($product);
            }
            $this->offsetSet(self::PRODUCTS, $products);
        }

        return $products;
    }

    protected function setCollection(): AbstractCollection
    {
        if (empty($this->collection))
            $this->collection = $this->getProducts() ?? [];

        return $this;
    }
}

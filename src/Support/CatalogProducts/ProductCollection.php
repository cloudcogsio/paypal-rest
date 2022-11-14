<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Support\AbstractCollection;

class ProductCollection extends AbstractCollection
{
    protected const PRODUCTS = 'products';

    protected function getProducts(): ?array
    {
        if (is_array($this->{self::PRODUCTS}) && count($this->{self::PRODUCTS}) > 0)
        {
            $products = [];
            foreach ($this->{self::PRODUCTS} as $product)
            {
                $products[] = new Product($product);
            }
            $this->offsetSet(self::PRODUCTS, $products);
        }
        return $this->{self::PRODUCTS};
    }

    protected function setCollection(): AbstractCollection
    {
        $this->collection = $this->getProducts();
        return $this;
    }
}

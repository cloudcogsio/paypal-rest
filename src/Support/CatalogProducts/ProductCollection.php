<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Support\AbstractCollection;

class ProductCollection extends AbstractCollection
{
    public function getProducts(): ?array
    {
        if (is_array($this->products) && count($this->products) > 0)
        {
            $products = [];
            foreach ($this->products as $product)
            {
                $products[] = new Product($product);
            }
            $this->offsetSet('products', $products);
        }
        return $this->products;
    }

    protected function setCollection(): AbstractCollection
    {
        $this->collection = $this->getProducts();
        return $this;
    }
}

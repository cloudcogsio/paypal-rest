<?php

namespace Cloudcogs\PayPal;

use Cloudcogs\PayPal\Message\CatalogProducts\CreateProduct;
use Cloudcogs\PayPal\Message\CatalogProducts\ListProducts;
use Cloudcogs\PayPal\Message\CatalogProducts\ShowProductDetails;
use Cloudcogs\PayPal\Message\CatalogProducts\UpdateProduct;
use Cloudcogs\PayPal\Support\CatalogProducts\ProductRequest;

class CatalogProducts extends RestGateway
{
    /******************** CATALOG PRODUCTS *******************/

    /**
     * Create a product
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_create
     * @param ProductRequest|null $product
     * @return CreateProduct
     */
    public function CreateProduct(?ProductRequest $product = null): CreateProduct
    {
        /** @var $request CreateProduct */
        $request = $this->createRequest(CreateProduct::class, []);
        $request->Product($product);

        return $request->setGateway($this);
    }

    /**
     * List products
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_list
     * @param array $parameters
     * @return ListProducts
     */
    public function ListProducts(array $parameters = ['pageNumber' => 1, 'pageSize' => 10, 'totalPagesRequired' => true]): ListProducts
    {
        /** @var $request ListProducts */
        $request = $this->createRequest(ListProducts::class, $parameters);

        return $request->setGateway($this);
    }

    /**
     * Updates a product, by ID.
     *
     * Available setters are:
     *   setProductDescription
     *   setProductCategory
     *   setImageUrl
     *   setHomeUrl
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_patch
     * @param string $productId
     * @param array $parameters
     * @return UpdateProduct
     */
    public function UpdateProduct(string $productId, array $parameters = []): UpdateProduct
    {
        /** @var $request UpdateProduct */
        $request = $this->createRequest(UpdateProduct::class, $parameters);
        $request->setProductId($productId);

        return $request->setGateway($this);
    }

    /**
     * Shows details for a product, by ID.
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_get
     * @param string $productId
     * @return ShowProductDetails
     */
    public function ShowProductDetails(string $productId): ShowProductDetails
    {
        /** @var $request ShowProductDetails */
        $request = $this->createRequest(ShowProductDetails::class, []);
        $request->setProductId($productId);

        return $request->setGateway($this);
    }
}

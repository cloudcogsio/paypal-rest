<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPatchObjectOperationException;
use Cloudcogs\PayPal\Exception\InvalidProductCategoryException;
use Cloudcogs\PayPal\Exception\InvalidProductUpdateDataException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\CatalogProducts\ProductCategories;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\PatchObject;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Update a product by ID
 *
 * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_patch
 */
class UpdateProduct extends AbstractRequest
{
    const ENDPOINT = '/v1/catalogs/products/';
    const PARAM_PRODUCT_ID = 'product_id';
    const PARAM_DESCRIPTION = 'description';
    const PARAM_CATEGORY = 'category';
    const PARAM_IMAGE_URL = 'image_url';
    const PARAM_HOME_URL = 'home_url';

    protected const SUFFIX_OPERATION = '_operation';

    protected array $updates = [];

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new UpdateProductResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.$this->getProductId();
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_PATCH;
    }

    public function getProductId(): string
    {
        return $this->getParameter(self::PARAM_PRODUCT_ID);
    }

    public function setProductId(string $id): UpdateProduct
    {
        return $this->setParameter(self::PARAM_PRODUCT_ID, $id);
    }

    public function getProductDescription(): ?string
    {
        return $this->getParameter(self::PARAM_DESCRIPTION);
    }

    /**
     * Set new product description
     *
     * @param string $value
     * @return UpdateProduct
     */
    public function setProductDescription(string $value): UpdateProduct
    {
        $this->setParameter(self::PARAM_DESCRIPTION, $value);
        return $this;
    }

    public function getProductDescriptionOperation(): string
    {
        return $this->getParameter(self::PARAM_DESCRIPTION.self::SUFFIX_OPERATION) ?? PatchObject::OP_ADD;
    }

    /**
     * Set the operation for description
     *
     * Options are
     *   add, replace, remove
     *
     * @param string $op
     * @return UpdateProduct
     * @throws InvalidPatchObjectOperationException
     */
    public function setProductDescriptionOperation(string $op): UpdateProduct
    {
        PatchObject::validateOperation($op);

        $this->setParameter(self::PARAM_DESCRIPTION.self::SUFFIX_OPERATION, $op);
        return $this;
    }

    public function getProductCategory(): ?string
    {
        return $this->getParameter(self::PARAM_CATEGORY);
    }

    /**
     * Set new product category
     *
     * @param string $category
     * @return UpdateProduct
     * @throws InvalidProductCategoryException
     */
    public function setProductCategory(string $category): UpdateProduct
    {
        ProductCategories::validateCategory($category);

        $this->setParameter(self::PARAM_CATEGORY, $category);
        return $this;
    }

    public function getProductCategoryOperation(): string
    {
        return $this->getParameter(self::PARAM_CATEGORY.self::SUFFIX_OPERATION) ?? PatchObject::OP_ADD;
    }

    /**
     * Set the operation for category
     *
     * Options are
     *   add, replace, remove
     *
     * @param string $op
     * @return UpdateProduct
     * @throws InvalidPatchObjectOperationException
     */
    public function setProductCategoryOperation(string $op): UpdateProduct
    {
        PatchObject::validateOperation($op);

        $this->setParameter(self::PARAM_CATEGORY.self::SUFFIX_OPERATION, $op);
        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->getParameter(self::PARAM_IMAGE_URL);
    }

    /**
     * Set the new product image url
     *
     * @param string $value
     * @return $this
     */
    public function setImageUrl(string $value): UpdateProduct
    {
        $this->setParameter(self::PARAM_IMAGE_URL, $value);
        return $this;
    }

    public function getImageUrlOperation(): string
    {
        return $this->getParameter(self::PARAM_IMAGE_URL.self::SUFFIX_OPERATION) ?? PatchObject::OP_ADD;
    }

    /**
     * Set the operation for image url
     *
     * Options are
     *   add, replace, remove
     *
     * @param string $op
     * @return $this
     * @throws InvalidPatchObjectOperationException
     */
    public function setImageUrlOperation(string $op): UpdateProduct
    {
        PatchObject::validateOperation($op);

        $this->setParameter(self::PARAM_IMAGE_URL.self::SUFFIX_OPERATION, $op);
        return $this;
    }

    public function getHomeUrl(): ?string
    {
        return $this->getParameter(self::PARAM_HOME_URL);
    }

    /**
     * Set new product homepage url
     *
     * @param string $value
     * @return $this
     */
    public function setHomeUrl(string $value): UpdateProduct
    {
        $this->setParameter(self::PARAM_HOME_URL, $value);
        return $this;
    }

    public function getHomeUrlOperation(): string
    {
        return $this->getParameter(self::PARAM_HOME_URL.self::SUFFIX_OPERATION) ?? PatchObject::OP_ADD;
    }

    /**
     * Set the operation for home url
     *
     * Options are
     *   add, replace, remove
     *
     * @param string $op
     * @return $this
     * @throws InvalidPatchObjectOperationException
     */
    public function setHomeUrlOperation(string $op): UpdateProduct
    {
        PatchObject::validateOperation($op);

        $this->setParameter(self::PARAM_HOME_URL.self::SUFFIX_OPERATION, $op);
        return $this;
    }

    /**
     * @inheritDoc
     * @throws AccessTokenNotFoundException
     * @throws InvalidPatchObjectOperationException
     * @throws InvalidProductUpdateDataException
     * @throws \JsonException
     */
    public function getData()
    {
        $this->includeAuthorization();

        // Descr
        $descr = $this->getProductDescription();
        if ($descr !== null)
        {
            $descrPatch = new PatchObject();
            $descrPatch
                ->setOperation($this->getProductDescriptionOperation())
                ->setPath('/description')
                ->setValue($descr);
            $this->updates[] = $descrPatch;
        }

        // Category
        $category = $this->getProductCategory();
        if ($category !== null)
        {
            $categoryPatch = new PatchObject();
            $categoryPatch
                ->setOperation($this->getProductCategoryOperation())
                ->setPath('/category')
                ->setValue($category);
            $this->updates[] = $categoryPatch;
        }

        // Image URL
        $image_url = $this->getImageUrl();
        if ($image_url !== null)
        {
            $imageUrlPatch = new PatchObject();
            $imageUrlPatch
                ->setOperation($this->getImageUrlOperation())
                ->setPath('/image_url')
                ->setValue($image_url);
            $this->updates[] = $imageUrlPatch;
        }

        // Home URL
        $home_url = $this->getImageUrl();
        if ($home_url !== null)
        {
            $homeUrlPatch = new PatchObject();
            $homeUrlPatch
                ->setOperation($this->getHomeUrlOperation())
                ->setPath('/home_url')
                ->setValue($home_url);
            $this->updates[] = $homeUrlPatch;
        }

        if (empty($this->updates))
            throw new InvalidProductUpdateDataException();

        return (new JsonSerializableArrayObject())->toJsonString($this->updates);
    }
}

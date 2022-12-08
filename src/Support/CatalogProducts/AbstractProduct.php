<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Exception\InvalidProductCategoryException;
use Cloudcogs\PayPal\Exception\InvalidProductTypeException;
use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\LinksHydratorTrait;

/**
 * Abstract Product class.
 */
class AbstractProduct extends JsonSerializableArrayObject
{
    use LinksHydratorTrait;

    /**
     * Physical goods.
     */
    const TYPE_PHYSICAL = 'PHYSICAL';

    /**
     * Digital goods.
     */
    const TYPE_DIGITAL = 'DIGITAL';

    /**
     * A service. For example, technical support.
     */
    const TYPE_SERVICE = 'SERVICE';

    protected const CREATE_TIME = 'create_time';
    protected const DESCRIPTION = 'description';
    protected const ID = 'id';
    protected const LINKS = 'links';
    protected const NAME = 'name';
    protected const TYPE = 'type';
    protected const CATEGORY = 'category';
    protected const HOME_URL = 'home_url';
    protected const IMAGE_URL = 'image_url';

    /**
     * The date and time when the product was created, in Internet date and time format.
     *
     * @throws \Exception
     */
    public function getCreateTime(): ?string
    {
        return $this->{self::CREATE_TIME};
    }

    /**
     * @return string|null The product description.
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * @param string $description The product description.
     * @return AbstractProduct
     * @throws ValueOutOfBoundsException
     */
    public function setDescription(string $description): AbstractProduct
    {
        $length = strlen($description);
        if ($length < 1 || $length > 256) throw new ValueOutOfBoundsException($description);

        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }

    /**
     * @return string|null The ID of the product.
     */
    public function getId(): ?string
    {
        return $this->{self::ID};
    }

    /**
     * @param string $id The ID of the product.
     * @return AbstractProduct
     * @throws ValueOutOfBoundsException
     */
    public function setId(string $id): AbstractProduct
    {
        $length = strlen($id);
        if ($length < 6 || $length > 50) throw new ValueOutOfBoundsException($id);

        $this->offsetSet(self::ID, $id);
        return $this;
    }

    /**
     * @return array|null An array of request-related HATEOAS links.
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $links;
    }

    /**
     * @return string|null The product name.
     */
    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    /**
     * @param string $name The product name.
     * @return AbstractProduct
     * @throws ValueOutOfBoundsException
     */
    public function setName(string $name): AbstractProduct
    {
        $length = strlen($name);
        if ($length < 1 || $length > 127) throw new ValueOutOfBoundsException($name);

        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    /**
     * @return string|null The product type. Indicates whether the product is physical or tangible goods, or a service.
     */
    public function getType(): ?string
    {
        return $this->{self::TYPE};
    }

    /**
     * @param string $type
     * @return AbstractProduct
     * @throws InvalidProductTypeException
     */
    public function setType(string $type): AbstractProduct
    {
        switch ($type)
        {
            case self::TYPE_DIGITAL:
            case self::TYPE_PHYSICAL:
            case self::TYPE_SERVICE:
                $this->offsetSet(self::TYPE, $type);
                return $this;
        }

        throw new InvalidProductTypeException($type);
    }

    /**
     * @return string|null The product category.
     */
    public function getCategory(): ?string
    {
        return $this->{self::CATEGORY};
    }

    /**
     * @param string $category The product category.
     * @return AbstractProduct
     * @throws InvalidProductCategoryException
     */
    public function setCategory(string $category): AbstractProduct
    {
        $categories = (new ProductCategories())();
        if (in_array($category, $categories))
        {
            $this->offsetSet(self::CATEGORY, $category);
            return $this;
        }

        throw new InvalidProductCategoryException($category);
    }

    /**
     * @return string|null The home page URL for the product.
     */
    public function getHomeUrl(): ?string
    {
        return $this->{self::HOME_URL};
    }

    /**
     * @param string $home_url The home page URL for the product.
     * @return AbstractProduct
     * @throws ValueOutOfBoundsException
     */
    public function setHomeUrl(string $home_url): AbstractProduct
    {
        $length = strlen($home_url);
        if ($length < 1 || $length > 2000) throw new ValueOutOfBoundsException($home_url);

        $this->offsetSet(self::HOME_URL, $home_url);
        return $this;
    }

    /**
     * @return string|null The image URL for the product.
     */
    public function getImageUrl(): ?string
    {
        return $this->{self::IMAGE_URL};
    }

    /**
     * @param string $image_url The image URL for the product.
     * @return AbstractProduct
     * @throws ValueOutOfBoundsException
     */
    public function setImageUrl(string $image_url): AbstractProduct
    {
        $length = strlen($image_url);
        if ($length < 1 || $length > 2000) throw new ValueOutOfBoundsException($image_url);

        $this->offsetSet(self::IMAGE_URL, $image_url);
        return $this;
    }
}

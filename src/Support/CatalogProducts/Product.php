<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Exception\InvalidProductCategoryException;
use Cloudcogs\PayPal\Exception\InvalidProductTypeException;
use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Link;

class Product extends JsonSerializableArrayObject
{
    const TYPE_PHYSICAL = 'PHYSICAL';
    const TYPE_DIGITAL = 'DIGITAL';
    const TYPE_SERVICE = 'SERVICE';

    protected const ID = 'id';
    protected const NAME = 'name';
    protected const DESCRIPTION = 'description';
    protected const TYPE = 'type';
    protected const CATEGORY = 'category';
    protected const HOME_URL = 'home_url';
    protected const IMAGE_URL = 'image_url';
    protected const CREATE_TIME = 'create_time';
    protected const UPDATE_TIME = 'update_time';
    protected const LINKS = 'links';

    public function getId(): ?string
    {
        return $this->{self::ID};
    }

    public function setId(string $id): Product
    {
        $this->offsetSet(self::ID, $id);
        return $this;
    }

    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    public function setName(string $name): Product
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    public function setDescription(string $description): Product
    {
        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }

    public function getType(): ?string
    {
        return $this->{self::TYPE};
    }

    /**
     * @param string $type
     * @return $this
     * @throws InvalidProductTypeException
     */
    public function setType(string $type): Product
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

    public function getCategory(): ?string
    {
        return $this->{self::CATEGORY};
    }

    /**
     * @param string $category
     * @return $this
     * @throws InvalidProductCategoryException
     */
    public function setCategory(string $category): Product
    {
        $categories = (new ProductCategories())();
        if (in_array($category, $categories))
        {
            $this->offsetSet(self::CATEGORY, $category);
            return $this;
        }

        throw new InvalidProductCategoryException($category);
    }

    public function getHomeUrl(): ?string
    {
        return $this->{self::HOME_URL};
    }

    public function setHomeUrl(string $home_url): Product
    {
        $this->offsetSet(self::HOME_URL, $home_url);
        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->{self::IMAGE_URL};
    }

    public function setImageUrl(string $image_url): Product
    {
        $this->offsetSet(self::IMAGE_URL, $image_url);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function getCreateTime(): ?\DateTime
    {
        return ($this->offsetExists(self::CREATE_TIME)) ?
            new \DateTime($this->{self::CREATE_TIME}) :
            null;
    }

    /**
     * @throws \Exception
     */
    public function getUpdateTime(): ?\DateTime
    {
        return ($this->offsetExists(self::UPDATE_TIME)) ?
            new \DateTime($this->{self::UPDATE_TIME}) :
            null;
    }

    public function getLinks(): ?array
    {
        $links = $this->{self::LINKS};
        if (is_array($links))
        {
            foreach ($links as $i => $link) {
                if (is_array($link))
                {
                    $links[$link[Link::REL]] = new Link($link);
                    unset($links[$i]);
                }
            }

            $this->offsetSet(self::LINKS, $links);
        }

        return $this->{self::LINKS};
    }
}

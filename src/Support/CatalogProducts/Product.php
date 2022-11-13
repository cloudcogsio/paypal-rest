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

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): Product
    {
        $this->offsetSet('id', $id);
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->offsetSet('name', $name);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): Product
    {
        $this->offsetSet('description', $description);
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
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

                $this->offsetSet('type', $type);
                return $this;
        }

        throw new InvalidProductTypeException($type);
    }

    public function getCategory(): ?string
    {
        return $this->category;
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
            $this->offsetSet('category', $category);
            return $this;
        }

        throw new InvalidProductCategoryException($category);
    }

    public function getHomeUrl(): ?string
    {
        return $this->home_url;
    }

    public function setHomeUrl(string $home_url): Product
    {
        $this->offsetSet('home_url', $home_url);
        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): Product
    {
        $this->offsetSet('image_url', $image_url);
        return $this;
    }

    public function getCreateTime(): ?\DateTime
    {
        return ($this->offsetExists('create_time')) ?
            new \DateTime($this->create_time) :
            null;
    }

    public function getUpdateTime(): ?\DateTime
    {
        return ($this->offsetExists('update_time')) ?
            new \DateTime($this->update_time) :
            null;
    }

    public function getLinks(): ?array
    {
        if (is_array($this->links))
        {
            $links = [];
            foreach ($this->links as $link) {
                $links[$link['rel']] = new Link($link);
            }

            $this->offsetSet('links', $links);
        }

        return $this->links;
    }
}

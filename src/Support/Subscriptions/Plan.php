<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\Link;
use Cloudcogs\PayPal\Support\Taxes;

class Plan extends JsonSerializableArrayObject
{
    protected const ID = 'id';
    protected const PRODUCT_ID = 'product_id';
    protected const NAME = 'name';
    protected const DESCRIPTION = 'description';
    protected const STATUS = 'status';
    protected const BILLING_CYCLES = 'billing_cycles';
    protected const TAXES = 'taxes';
    protected const CREATE_TIME = 'create_time';
    protected const UPDATE_TIME = 'update_time';
    protected const LINKS = 'links';

    public function getId(): ?string
    {
        return $this->{self::ID};
    }

    public function setId(string $id): Plan
    {
        $this->offsetSet(self::ID, $id);
        return $this;
    }

    public function getProductId(): ?string
    {
        return $this->{self::PRODUCT_ID};
    }

    public function setProductId(string $productId): Plan
    {
        $this->offsetSet(self::PRODUCT_ID, $productId);
        return $this;
    }

    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    public function setName(string $name): Plan
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    public function setDescription(string $description): Plan
    {
        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    public function setStatus(string $status): Plan
    {
        $this->offsetSet(self::STATUS, $status);
        return $this;
    }

    public function getBillingCycles(): ?array
    {
        return $this->{self::BILLING_CYCLES};
    }

    public function setBillingCycles(array $billingCycles): Plan
    {
        $this->offsetSet(self::BILLING_CYCLES, $billingCycles);
        return $this;
    }

    public function getTaxes(): ?Taxes
    {
        if (is_array($this->{self::TAXES}))
            $this->setTaxes(new Taxes($this->{self::TAXES}));

        return $this->{self::TAXES};
    }

    public function setTaxes(Taxes $taxes): Plan
    {
        $this->offsetSet(self::TAXES, $taxes);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function getCreateTime(): ?\DateTime
    {
        if (is_string($this->{self::CREATE_TIME}))
            $this->setCreateTime(new \DateTime($this->{self::CREATE_TIME}));

        return $this->{self::CREATE_TIME};
    }

    public function setCreateTime(\DateTime $createTime): Plan
    {
        $this->offsetSet(self::CREATE_TIME, $createTime);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function getUpdateTime(): ?\DateTime
    {
        if (is_string($this->{self::UPDATE_TIME}))
            $this->setUpdateTime(new \DateTime($this->{self::UPDATE_TIME}));

        return $this->{self::UPDATE_TIME};
    }

    public function setUpdateTime(\DateTime $updateTime): Plan
    {
        $this->offsetSet(self::UPDATE_TIME, $updateTime);
        return $this;
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

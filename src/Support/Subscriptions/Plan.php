<?php

namespace Cloudcogs\PayPal\Support\Subscriptions;

use Cloudcogs\PayPal\Support\DateTime;
use Cloudcogs\PayPal\Support\LinksHydratorTrait;

class Plan extends PlanRequest
{
    use LinksHydratorTrait;

    protected const ID = 'id';
    protected const CREATE_TIME = 'create_time';
    protected const UPDATE_TIME = 'update_time';
    protected const LINKS = 'links';

    /**
     * The unique PayPal-generated ID for the plan.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->{self::ID};
    }

    /**
     * The date and time when the plan was created, in Internet date and time format.
     *
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->{self::CREATE_TIME};
    }

    /**
     * The date and time when the plan was created, in Internet date and time format.
     *
     * @param DateTime $createTime
     * @return Plan
     */
    public function setCreateTime(DateTime $createTime): Plan
    {
        $this->offsetSet(self::CREATE_TIME, $createTime->__toString());
        return $this;
    }

    /**
     * The date and time when the plan was last updated, in Internet date and time format.
     *
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->{self::UPDATE_TIME};
    }

    /**
     * The date and time when the plan was last updated, in Internet date and time format.
     *
     * @param DateTime $updateTime
     * @return $this
     */
    public function setUpdateTime(DateTime $updateTime): Plan
    {
        $this->offsetSet(self::UPDATE_TIME, $updateTime->__toString());
        return $this;
    }

    /**
     * An array of request-related HATEOAS links.
     *
     * @return array|null
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $links;
    }
}

<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\LinksHydratorTrait;

/**
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-event
 */
class Event extends JsonSerializableArrayObject
{
    use LinksHydratorTrait;

    protected const ID = 'id';
    protected const CREATE_TIME = 'create_time';
    protected const RESOURCE_TYPE = 'resource_type';
    protected const EVENT_VERSION = 'event_version';
    protected const EVENT_TYPE = 'event_type';
    protected const SUMMARY = 'summary';
    protected const RESOURCE_VERSION = 'resource_version';
    protected const RESOURCE = 'resource';
    protected const LINKS = 'links';

    /**
     * The ID of the webhook event notification.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->{self::ID};
    }

    /**
     * The date and time when the webhook event notification was created, in Internet date and time format.
     *
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->{self::CREATE_TIME};
    }

    /**
     * The name of the resource related to the webhook notification event.
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return $this->{self::RESOURCE_TYPE};
    }

    /**
     * The event version in the webhook notification.
     *
     * @return string
     */
    public function getEventVersion(): string
    {
        return $this->{self::EVENT_VERSION};
    }

    /**
     * The event that triggered the webhook event notification.
     *
     * @return string
     */
    public function getEventType(): string
    {
        return $this->{self::EVENT_TYPE};
    }

    /**
     * A summary description for the event notification.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->{self::SUMMARY};
    }

    /**
     * The resource version in the webhook notification.
     *
     * @return string
     */
    public function getResourceVersion(): string
    {
        return $this->{self::RESOURCE_VERSION};
    }

    /**
     * The resource associated with the event.
     *
     * @return array
     */
    public function getResource(): array
    {
        return $this->{self::RESOURCE};
    }

    /**
     * The links related to the event.
     *
     * @return array|null
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $links;
    }

    public function setId(string $id): Event {
        $this->offsetSet(self::ID, $id);
        return $this;
    }

    public function setCreateTime(string $createTime): Event {
        $this->offsetSet(self::CREATE_TIME, $createTime);
        return $this;
    }

    public function setResourceType(string $resourceType): Event {
        $this->offsetSet(self::RESOURCE_TYPE, $resourceType);
        return $this;
    }

    public function setEventVersion(string $eventVersion): Event {
        $this->offsetSet(self::EVENT_VERSION, $eventVersion);
        return $this;
    }

    public function setEventType(string $eventType): Event {
        $this->offsetSet(self::EVENT_TYPE, $eventType);
        return $this;
    }

    public function setSummary(string $summary): Event {
        $this->offsetSet(self::SUMMARY, $summary);
        return $this;
    }

    public function setResourceVersion(string $resourceVersion): Event {
        $this->offsetSet(self::RESOURCE_VERSION, $resourceVersion);
        return $this;
    }

    public function setResource(array $resource): Event {
        $this->offsetSet(self::RESOURCE, $resource);
        return $this;
    }
}

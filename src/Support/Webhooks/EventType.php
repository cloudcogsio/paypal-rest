<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

/**
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-event_type
 */
class EventType extends JsonSerializableArrayObject
{
    protected const NAME = 'name';
    protected const DESCRIPTION = 'description';
    protected const STATUS = 'status';
    protected const RESOURCE_VERSIONS = 'resource_versions';

    /**
     * The unique event name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->{self::NAME};
    }

    public function setName(string $name): EventType
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }

    /**
     * A human-readable description of the event.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * The status of a webhook event.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->{self::STATUS};
    }

    /**
     * Identifier for the event type example: 1.0/2.0 etc.
     *
     * @return array|null
     */
    public function getResourceVersions(): ?array
    {
        return $this->{self::RESOURCE_VERSIONS};
    }
}

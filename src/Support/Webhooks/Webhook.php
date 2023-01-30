<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;
use Cloudcogs\PayPal\Support\LinksHydratorTrait;

/**
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-webhook
 */
class Webhook extends JsonSerializableArrayObject
{
    use LinksHydratorTrait;

    protected const ID = 'id';
    protected const URL = 'url';
    protected const EVENT_TYPES = 'event_types';
    protected const LINKS = 'links';

    /**
     * The ID of the webhook.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->{self::ID};
    }

    /**
     * The Internet accessible URL configured to listen for incoming POST notification messages containing
     * event information.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->{self::URL};
    }

    /**
     * The Internet accessible URL configured to listen for incoming POST notification messages containing
     * event information.
     *
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Webhook
    {
        $this->offsetSet(self::URL, $url);
        return $this;
    }

    /**
     * An array of events to which this webhook is subscribed.
     *
     * @return array|null
     */
    public function getEventTypes(): ?array
    {
        $eventTypes = $this->{self::EVENT_TYPES};
        foreach ($eventTypes as $i => $eventTypeData) {
            if (is_array($eventTypeData)) {
                $eventType = new EventType($eventTypeData);
                $eventTypes[$i] = $eventType;
            }
        }

        $this->offsetSet(self::EVENT_TYPES, $eventTypes);

        return $eventTypes;
    }

    /**
     * An array of events to which to subscribe your webhook.
     * To subscribe to all events, including events as they are added, specify the asterisk wild card.
     * To replace the event_types array, specify the asterisk wild card.
     *
     * [{"name":"*"}]
     *
     * @param array $eventTypes
     * @return Webhook
     */
    public function setEventTypes(array $eventTypes): Webhook
    {
        $this->offsetSet(self::EVENT_TYPES, $eventTypes);
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

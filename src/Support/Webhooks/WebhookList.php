<?php

namespace Cloudcogs\PayPal\Support\Webhooks;

use Cloudcogs\PayPal\Support\JsonSerializableArrayObject;

/**
 * A list of webhooks.
 *
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#definition-webhook_list
 */
class WebhookList extends JsonSerializableArrayObject
{
    protected const WEBHOOKS = 'webhooks';

    public function __construct($array = [], $flags = 0, $iteratorClass = "ArrayIterator")
    {
        parent::__construct($array, $flags, $iteratorClass);
        $this->offsetSet(self::WEBHOOKS, $this->getWebhooks());
    }

    /**
     * Returns a Webhook by specified Id
     *
     * @param string $webhookId
     * @return Webhook|null
     */
    public function findById(string $webhookId): ?Webhook
    {
        $webhooks = $this->{self::WEBHOOKS};
        return $webhooks[$webhookId] ?? null;
    }

    /**
     * An array of webhooks.
     * @return Webhook[]
     */
    public function getWebhooks(): array
    {
        $webhooks = $this->{self::WEBHOOKS};
        if (is_array($webhooks))
        {
            foreach ($webhooks as $i => $webhookData)
            {
                if (is_array($webhookData))
                {
                    $Webhook = new Webhook($webhookData);

                    $webhooks[$Webhook->getId()] = $Webhook;
                    unset($webhooks[$i]);
                }
            }
        }

        return $webhooks;
    }
}

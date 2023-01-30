<?php

namespace Cloudcogs\PayPal\Message\Webhooks;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;
use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lists webhooks for an app.
 *
 * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_list
 */
class ListWebhooks extends AbstractRequest
{
    const ENDPOINT = '/v1/notifications/webhooks';
    const ANCHOR_TYPE_APPLICATION = 'APPLICATION';
    const ANCHOR_TYPE_ACCOUNT = 'ACCOUNT';
    PROTECTED const ANCHOR_TYPE = 'anchor_type';

    /**
     * @throws \JsonException
     */
    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ListWebhooksResponse($this, $response);
    }

    public function getEndpoint(): string
    {
        $anchorType = $this->getParameter(self::ANCHOR_TYPE);
        return self::ENDPOINT.(($anchorType != null) ? "?".self::ANCHOR_TYPE."=".$anchorType : "");
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    /**
     * Specify the "anchor_type" query parameter value (optional)
     *
     * @param string $anchorType
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setAnchorType(string $anchorType): ListWebhooks
    {
        switch ($anchorType)
        {
            case self::ANCHOR_TYPE_ACCOUNT:
            case self::ANCHOR_TYPE_APPLICATION:
                $this->setParameter(self::ANCHOR_TYPE, $anchorType);
                break;

            default:
                throw new ValueOutOfBoundsException($anchorType);
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @throws AccessTokenNotFoundException
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }
}

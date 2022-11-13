<?php

namespace Cloudcogs\PayPal\Message;

use Cloudcogs\PayPal\Constants;
use Omnipay\Common\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    protected ResponseInterface $HttpResponse;
    protected \ArrayObject $dataObject;

    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->HttpResponse = $response;
        $body = $response->getBody()->getContents();

        parent::__construct($request, json_decode($body, true));
    }

    public function getHttpResponse(): ResponseInterface
    {
        return $this->HttpResponse;
    }

    public function getCode(): int
    {
        return $this->HttpResponse->getStatusCode();
    }

    public function getMessage(): ?string
    {
        return $this->HttpResponse->getReasonPhrase();
    }

    public function getDataAsObject(): \ArrayObject
    {
        return $this->dataObject ?? $this->dataObject = new \ArrayObject($this->getData());
    }

    /**
     * Retrieve the PayPal Debug Id header value returned with the response
     *
     * @return string|null
     */
    public function getPayPalDebugId(): ?string
    {
        return $this->HttpResponse->getHeader(Constants::HEADER_PAYPAL_DEBUG_ID)[0] ?? null;
    }

    /**
     * Retrieve the PayPal Request Id header value that was sent with the request
     *
     * @return string|null
     */
    public function getPayPalRequestId(): ?string
    {
        /** @var $request AbstractRequest */
        $request = $this->getRequest();

        return $request->getPayPalRequestId();
    }
}

<?php

namespace Cloudcogs\PayPal\Message;

use Cloudcogs\PayPal\Support\Error;
use Omnipay\Common\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorResponse extends AbstractResponse
{
    protected Error $error;

    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        parent::__construct($request, $response);
        if (!$this->isIdentityError())
            $this->error = new Error($this->getData());
    }

    public function isSuccessful(): bool
    {
        return false;
    }

    public function isIdentityError(): bool
    {
        return $this->getDataAsObject()->offsetExists('error');
    }

    public function getMessage(): string
    {
        return ($this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('error_description') :
            $this->error->getMessage();
    }

    public function getError(): string
    {
        return ($this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('error') :
            $this->error->getName();
    }

    public function getDebugId(): ?string
    {
        return ($this->isIdentityError()) ?
            null :
            $this->error->getDebugId();
    }

    public function getDetails(): ?array
    {
        return ($this->isIdentityError()) ?
            null :
            $this->error->getDetails();
    }

    public function getLinks(): ?array
    {
        return ($this->isIdentityError()) ?
            null :
            $this->error->getLinks();
    }

    public function getPayPalError(): ?Error
    {
        return $this->error;
    }
}

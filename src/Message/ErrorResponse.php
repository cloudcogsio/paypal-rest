<?php

namespace Cloudcogs\PayPal\Message;

class ErrorResponse extends AbstractResponse
{
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
            $this->getDataAsObject()->offsetGet('message');
    }

    public function getError(): string
    {
        return ($this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('error') :
            $this->getDataAsObject()->offsetGet('name');
    }

    public function getDebugId(): ?string
    {
        return (!$this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('debug_id') :
            null;
    }

    public function getDetails(): ?array
    {
        return (!$this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('details') :
            null;
    }

    public function getLinks(): ?array
    {
        return (!$this->isIdentityError()) ?
            $this->getDataAsObject()->offsetGet('links') :
            null;
    }
}

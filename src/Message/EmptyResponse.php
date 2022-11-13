<?php

namespace Cloudcogs\PayPal\Message;

class EmptyResponse extends AbstractResponse
{
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }
}

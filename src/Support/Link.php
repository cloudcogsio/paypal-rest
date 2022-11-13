<?php

namespace Cloudcogs\PayPal\Support;

class Link extends JsonSerializableArrayObject
{
    public function getHref(): ?string
    {
        return $this->href;
    }

    public function getRel(): ?string
    {
        return $this->rel;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }
}

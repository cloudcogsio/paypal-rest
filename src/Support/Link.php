<?php

namespace Cloudcogs\PayPal\Support;

class Link extends JsonSerializableArrayObject
{
    const HREF = 'href';
    const REL = 'rel';
    const METHOD = 'method';

    public function getHref(): ?string
    {
        return $this->{self::HREF};
    }

    public function getRel(): ?string
    {
        return $this->{self::REL};
    }

    public function getMethod(): ?string
    {
        return $this->{self::METHOD};
    }
}

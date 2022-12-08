<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-link_description
 */
class Link extends JsonSerializableArrayObject
{
    const HREF = 'href';
    const REL = 'rel';
    const METHOD = 'method';

    /**
     * The complete target URL.
     *
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->{self::HREF};
    }

    /**
     * The link relation type, which serves as an ID for a link that unambiguously describes the semantics of the link.
     *
     * @return string|null
     */
    public function getRel(): ?string
    {
        return $this->{self::REL};
    }

    /**
     * The HTTP method required to make the related call.
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->{self::METHOD};
    }
}

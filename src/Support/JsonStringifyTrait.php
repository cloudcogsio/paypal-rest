<?php

namespace Cloudcogs\PayPal\Support;

trait JsonStringifyTrait
{
    protected $JsonStringifyData;

    /**
     * @throws \JsonException
     */
    public function toJsonString($data = null): string
    {
        return json_encode(($data ?? $this->JsonStringifyData) ?? $this->getArrayCopy(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @throws \JsonException
     */
    public function __toString()
    {
        return $this->toJsonString();
    }
}

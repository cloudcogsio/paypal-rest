<?php

namespace Cloudcogs\PayPal\Support;

class JsonSerializableArrayObject extends \ArrayObject
{
    /**
     * @throws \JsonException
     */
    public function toJsonString(): string
    {
        return json_encode($this->getArrayCopy(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function __get($offset)
    {
        return ($this->offsetExists($offset)) ?
            $this->offsetGet($offset) :
            null;
    }

    public function __toString()
    {
        return $this->toJsonString();
    }
}

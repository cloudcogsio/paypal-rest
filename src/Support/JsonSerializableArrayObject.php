<?php

namespace Cloudcogs\PayPal\Support;

class JsonSerializableArrayObject extends \ArrayObject
{
    use JsonStringifyTrait;

    public function __get($offset)
    {
        return ($this->offsetExists($offset)) ?
            $this->offsetGet($offset) :
            null;
    }
}

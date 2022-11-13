<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\InvalidPatchObjectOperationException;

class PatchObject extends JsonSerializableArrayObject
{
    const OP_ADD = 'add';
    const OP_REMOVE = 'remove';
    const OP_REPLACE = 'replace';
    const OP_MOVE = 'move';
    const OP_COPY = 'copy';
    const OP_TEST = 'test';

    /**
     * @param string $op
     * @return bool
     * @throws InvalidPatchObjectOperationException
     */
    public static function validateOperation(string $op): bool
    {
        $reflection = new \ReflectionClass(__CLASS__);
        $constants = $reflection->getConstants();
        if (in_array($op, $constants)) {
            return true;
        }

        throw new InvalidPatchObjectOperationException($op);
    }

    /**
     * @param string $op
     * @return $this
     * @throws InvalidPatchObjectOperationException
     */
    public function setOperation(string $op): PatchObject
    {
        switch ($op)
        {
            case self::OP_ADD:
            case self::OP_REMOVE:
            case self::OP_REPLACE:
            case self::OP_MOVE:
            case self::OP_COPY:
            case self::OP_TEST:

            $this->offsetSet('op', $op);
            return $this;
        }

        throw new InvalidPatchObjectOperationException($op);
    }

    public function getOperation(): ?string
    {
        return $this->op;
    }

    public function setFrom(string $json_pointer): PatchObject
    {
        $this->offsetSet('from', $json_pointer);
        return $this;
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    public function setPath(string $json_pointer): PatchObject
    {
        $this->offsetSet('path', $json_pointer);
        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setValue(string $value): PatchObject
    {
        $this->offsetSet('value', $value);
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}

<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\InvalidPatchObjectOperationException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-patch
 */
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

    /**
     * The JSON Pointer to the target document location from which to move the value.
     * Required for the move operation.
     *
     * @param string $json_pointer
     * @return $this
     */
    public function setFrom(string $json_pointer): PatchObject
    {
        $this->offsetSet('from', $json_pointer);
        return $this;
    }

    /**
     * The JSON Pointer to the target document location from which to move the value.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * The JSON Pointer to the target document location at which to complete the operation.
     *
     * @param string $json_pointer
     * @return $this
     */
    public function setPath(string $json_pointer): PatchObject
    {
        $this->offsetSet('path', $json_pointer);
        return $this;
    }

    /**
     * The JSON Pointer to the target document location at which to complete the operation.
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * The value to apply. The remove operation does not require a value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value): PatchObject
    {
        $this->offsetSet('value', $value);
        return $this;
    }

    /**
     * The value to apply.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}

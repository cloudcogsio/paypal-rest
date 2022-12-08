<?php

namespace Cloudcogs\PayPal\Support;

class ErrorDetails extends JsonSerializableArrayObject
{
    protected const ISSUE = 'issue';
    protected const DESCRIPTION = 'description';
    protected const FIELD = 'field';
    protected const LOCATION = 'location';
    protected const VALUE = 'value';

    /**
     * @return string The unique, fine-grained application-level error code.
     */
    public function getIssue(): string
    {
        return $this->{self::ISSUE};
    }

    /**
     * @return string|null The human-readable description for an issue.
     * The description can change over the lifetime of an API, so clients must not depend on this value.
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * @return string|null The field that caused the error.
     * If this field is in the body, set this value to the field's JSON pointer value.
     * Required for client-side errors.
     */
    public function getField(): ?string
    {
        return $this->{self::FIELD};
    }

    /**
     * @return string|null The location of the field that caused the error. Value is body, path, or query.
     */
    public function getLocation(): ?string
    {
        return $this->{self::LOCATION};
    }

    /**
     * @return string|null The value of the field that caused the error.
     */
    public function getValue(): ?string
    {
        return $this->{self::VALUE};
    }
}

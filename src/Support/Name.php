<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * https://developer.paypal.com/docs/api/subscriptions/v1/#definition-name
 */
class Name extends JsonSerializableArrayObject
{
    protected const FULL_NAME = 'full_name';
    protected const GIVEN_NAME = 'given_name';
    protected const MIDDLE_NAME = 'middle_name';
    protected const PREFIX = 'prefix';
    protected const SUFFIX = 'suffix';
    protected const SURNAME = 'surname';

    /**
     * When the party is a person, the party's full name.
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->{self::FULL_NAME};
    }

    /**
     * @param string $value When the party is a person, the party's full name. (Max length 300)
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setFullName(string $value): Name
    {
        if (strlen($value) > 300) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::FULL_NAME, $value);
        return $this;
    }

    /**
     * When the party is a person, the party's given, or first, name.
     *
     * @return string|null
     */
    public function getGivenName(): ?string
    {
        return $this->{self::GIVEN_NAME};
    }

    /**
     * @param string $value When the party is a person, the party's given, or first, name. (Max length 140)
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setGivenName(string $value): Name
    {
        if (strlen($value) > 140) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::GIVEN_NAME, $value);
        return $this;
    }

    /**
     * When the party is a person, the party's middle name.
     * Use also to store multiple middle names including the patronymic, or father's, middle name.
     *
     * @return string|null
     */
    public function getMiddleName(): ?string
    {
        return $this->{self::MIDDLE_NAME};
    }

    /**
     * @param string $value When the party is a person, the party's middle name.
     * Use also to store multiple middle names including the patronymic, or father's, middle name. (Max length 140)
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setMiddleName(string $value): Name
    {
        if (strlen($value) > 140) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::MIDDLE_NAME, $value);
        return $this;
    }

    /**
     * The prefix, or title, to the party's name.
     *
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->{self::PREFIX};
    }

    /**
     * @param string $value The prefix, or title, to the party's name. (Max length 140)
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setPrefix(string $value): Name
    {
        if (strlen($value) > 140) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::PREFIX, $value);
        return $this;
    }

    /**
     * The suffix for the party's name.
     *
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->{self::SUFFIX};
    }

    /**
     * @param string $value The suffix for the party's name. (Max length 140)
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setSuffix(string $value): Name
    {
        if (strlen($value) > 140) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::SUFFIX, $value);
        return $this;
    }

    /**
     * When the party is a person, the party's surname or family name. Also known as the last name.
     *
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->{self::SURNAME};
    }

    /**
     * @param string $value When the party is a person, the party's surname or family name.
     * Also known as the last name. Required when the party is a person. Use also to store multiple surnames
     * including the matronymic, or mother's, surname. (Max length 140)
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setSurname(string $value): Name
    {
        if (strlen($value) > 140) throw new ValueOutOfBoundsException($value);

        $this->offsetSet(self::SURNAME, $value);
        return $this;
    }
}

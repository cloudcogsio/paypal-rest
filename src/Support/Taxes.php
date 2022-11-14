<?php

namespace Cloudcogs\PayPal\Support;

class Taxes extends JsonSerializableArrayObject
{
    protected const PERCENTAGE = 'percentage';
    protected const INCLUSIVE = 'inclusive';

    public function getPercentage(): ?string
    {
        return $this->{self::PERCENTAGE};
    }

    public function setPercentage(string $percentage): Taxes
    {
        $this->offsetSet(self::PERCENTAGE, $percentage);
        return $this;
    }

    public function getInclusive(): ?bool
    {
        return $this->{self::INCLUSIVE};
    }

    public function setInclusive(bool $inclusive): Taxes
    {
        $this->offsetSet(self::INCLUSIVE, $inclusive);
        return $this;
    }
}

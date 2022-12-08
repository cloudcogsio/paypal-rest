<?php

namespace Cloudcogs\PayPal\Support;

/**
 * The date and time, in Internet date and time format. Seconds are required while fractional seconds are optional.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-date_time
 */
class DateTime extends \DateTime
{
    public function __toString()
    {
        return $this->format(self::ATOM);
    }
}

<?php

namespace Cloudcogs\PayPal\Support;

/**
 * The year and month, in ISO-8601 YYYY-MM date format. See Internet date and time format.
 *
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-date_year_month
 */
class DateYearMonth extends \DateTime
{
    public function __toString()
    {
        return $this->format('Y-m');
    }
}

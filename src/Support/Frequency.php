<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\FrequencyIntervalCountOutOfBoundsException;
use Cloudcogs\PayPal\Exception\FrequencyIntervalUnitNotSetException;
use Cloudcogs\PayPal\Exception\InvalidFrequencyIntervalUnitException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-frequency
 */
class Frequency extends JsonSerializableArrayObject
{
    const INTERVAL_DAY = 'DAY';
    const INTERVAL_WEEK = 'WEEK';
    const INTERVAL_MONTH = 'MONTH';
    const INTERVAL_YEAR = 'YEAR';

    protected const INTERVAL_UNIT = 'interval_unit';
    protected const INTERVAL_COUNT = 'interval_count';

    /**
     * The interval at which the subscription is charged or billed.
     *
     * @return string|null
     */
    public function getIntervalUnit(): ?string
    {
        return $this->{self::INTERVAL_UNIT};
    }

    /**
     * The interval at which the subscription is charged or billed.
     * The possible values are:
     *  DAY. A daily billing cycle.
     *  WEEK. A weekly billing cycle.
     *  MONTH. A monthly billing cycle.
     *  YEAR. A yearly billing cycle.
     *
     * @param string $intervalUnit
     * @return $this
     * @throws InvalidFrequencyIntervalUnitException
     */
    public function setIntervalUnit(string $intervalUnit): Frequency
    {
        switch ($intervalUnit)
        {
            case self::INTERVAL_DAY:
            case self::INTERVAL_WEEK:
            case self::INTERVAL_MONTH:
            case self::INTERVAL_YEAR:
                $this->offsetSet(self::INTERVAL_UNIT, $intervalUnit);
                return $this;
        }

        throw new InvalidFrequencyIntervalUnitException($intervalUnit);
    }

    /**
     * The number of intervals after which a subscriber is billed.
     *
     * @return int|null
     */
    public function getIntervalCount(): ?int
    {
        return $this->{self::INTERVAL_COUNT};
    }

    /**
     * The number of intervals after which a subscriber is billed.
     * For example, if the interval_unit is DAY with an interval_count of 2, the subscription is billed once every two days.
     *
     * @param int $intervalCount
     * @return Frequency
     * @throws FrequencyIntervalCountOutOfBoundsException
     * @throws FrequencyIntervalUnitNotSetException
     */
    public function setIntervalCount(int $intervalCount): Frequency
    {
        $intervalUnit = $this->getIntervalUnit();
        if ($intervalUnit == null) throw new FrequencyIntervalUnitNotSetException();

        if ($intervalCount < 1) throw new FrequencyIntervalCountOutOfBoundsException($intervalCount);

        switch ($intervalUnit)
        {
            case self::INTERVAL_DAY:
                if ($intervalCount > 365)
                    throw new FrequencyIntervalCountOutOfBoundsException($intervalCount);
                break;

            case self::INTERVAL_WEEK:
                if ($intervalCount > 52)
                    throw new FrequencyIntervalCountOutOfBoundsException($intervalCount);
                break;

            case self::INTERVAL_MONTH:
                if ($intervalCount > 12)
                    throw new FrequencyIntervalCountOutOfBoundsException($intervalCount);
                break;

            case self::INTERVAL_YEAR:
                if ($intervalCount > 1)
                    throw new FrequencyIntervalCountOutOfBoundsException($intervalCount);
                break;
        }

        $this->offsetSet(self::INTERVAL_COUNT, $intervalCount);
        return $this;
    }
}

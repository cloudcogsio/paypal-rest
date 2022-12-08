<?php

namespace Cloudcogs\PayPal\Support;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-address_portable
 */
class AddressPortable extends JsonSerializableArrayObject
{
    protected const COUNTRY_CODE = 'country_code';
    protected const ADDRESS_LINE_1 = 'address_line_1';
    protected const ADDRESS_LINE_2 = 'address_line_2';
    protected const ADMIN_AREA_1 = 'admin_area_1';
    protected const ADMIN_AREA_2 = 'admin_area_2';
    protected const POSTAL_CODE = 'postal_code';

    /**
     * The two-character ISO 3166-1 code that identifies the country or region.
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->{self::COUNTRY_CODE};
    }

    /**
     * @param string $countryCode The two-character ISO 3166-1 code that identifies the country or region.
     * @return $this
     */
    public function setCountryCode(string $countryCode): AddressPortable
    {
        $this->offsetSet(self::COUNTRY_CODE, $countryCode);
        return $this;
    }

    /**
     * The first line of the address. For example, number or street.
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->{self::ADDRESS_LINE_1};
    }

    /**
     * The first line of the address. For example, number or street.
     * For example, 173 Drury Lane. Required for data entry and compliance and risk checks.
     * Must contain the full address.
     *
     * @param string $line
     * @return $this
     */
    public function setAddressLine1(string $line): AddressPortable
    {
        $this->offsetSet(self::ADDRESS_LINE_1, $line);
        return $this;
    }

    /**
     * The second line of the address. For example, suite or apartment number.
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->{self::ADDRESS_LINE_2};
    }

    /**
     * @param string $line The second line of the address. For example, suite or apartment number.
     * @return $this
     */
    public function setAddressLine2(string $line): AddressPortable
    {
        $this->offsetSet(self::ADDRESS_LINE_2, $line);
        return $this;
    }

    /**
     * The highest level subdivision in a country, which is usually a province, state, or ISO-3166-2 subdivision.
     * @return string|null
     */
    public function getAdminArea1(): ?string
    {
        return $this->{self::ADMIN_AREA_1};
    }

    /**
     * The highest level subdivision in a country, which is usually a province, state, or ISO-3166-2 subdivision.
     * Format for postal delivery. For example, CA and not California.
     * Value, by country, is:
     *    UK. A county.
     *    US. A state.
     *    Canada. A province.
     *    Japan. A prefecture.
     *    Switzerland. A kanton.
     *
     * @param string $area
     * @return $this
     */
    public function setAdminArea1(string $area): AddressPortable
    {
        $this->offsetSet(self::ADMIN_AREA_1, $area);
        return $this;
    }

    /**
     * A city, town, or village. Smaller than admin_area_level_1.
     *
     * @return string|null
     */
    public function getAdminArea2(): ?string
    {
        return $this->{self::ADMIN_AREA_2};
    }

    /**
     * @param string $area A city, town, or village. Smaller than admin_area_level_1.
     * @return $this
     */
    public function setAdminArea2(string $area): AddressPortable
    {
        $this->offsetSet(self::ADMIN_AREA_2, $area);
        return $this;
    }

    /**
     * The postal code, which is the zip code or equivalent.
     *
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->{self::POSTAL_CODE};
    }

    /**
     * @param string $postalCode The postal code, which is the zip code or equivalent.
     * Typically required for countries with a postal code or an equivalent.
     *
     * @return $this
     */
    public function setPostalCode(string $postalCode): AddressPortable
    {
        $this->offsetSet(self::POSTAL_CODE, $postalCode);
        return $this;
    }
}

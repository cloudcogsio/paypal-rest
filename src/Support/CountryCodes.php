<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

class CountryCodes
{
    const ALBANIA = 'AL';
    const ALGERIA = 'DZ';
    const ANDORRA = 'AD';
    const ANGOLA = 'AO';
    const ANGUILLA = 'AI';
    const ANTIGUA_AND_BARBUDA = 'AG';
    const ARGENTINA = 'AR';
    const ARMENIA = 'AM';
    const ARUBA = 'AW';
    const AUSTRALIA = 'AU';
    const AUSTRIA = 'AT';
    const AZERBAIJAN = 'AZ';
    const BAHAMAS = 'BS';
    const BAHRAIN = 'BH';
    const BARBADOS = 'BB';
    const BELARUS = 'BY';
    const BELGIUM = 'BE';
    const BELIZE = 'BZ';
    const BENIN = 'BJ';
    const BERMUDA = 'BM';
    const BHUTAN = 'BT';
    const BOLIVIA = 'BO';
    const BOSNIA_AND_HERZEGOVINA = 'BA';
    const BOTSWANA = 'BW';
    const BRAZIL = 'BR';
    const BRITISH_VIRGIN_ISLANDS = 'VG';
    const BRUNEI = 'BN';
    const BULGARIA = 'BG';
    const BURKINA_FASO = 'BF';
    const BURUNDI = 'BI';
    const CAMBODIA = 'KH';
    const CAMEROON = 'CM';
    const CANADA = 'CA';
    const CAPE_VERDE = 'CV';
    const CAYMAN_ISLANDS = 'KY';
    const CHAD = 'TD';
    const CHILE = 'CL';
    const CHINA = 'C2';
    const COLOMBIA = 'CO';
    const COMOROS = 'KM';
    const CONGO_BRAZZAVILLE = 'CG';
    const CONGO_KINSHASA = 'CD';
    const COOK_ISLANDS = 'CK';
    const COSTA_RICA = 'CR';
    const COTE_DIVOIRE = 'CI';
    const CROATIA = 'HR';
    const CYPRUS = 'CY';
    const CZECH_REPUBLIC = 'CZ';
    const DENMARK = 'DK';
    const DJIBOUTI = 'DJ';
    const DOMINICA = 'DM';
    const DOMINICAN_REPUBLIC = 'DO';
    const ECUADOR = 'EC';
    const EGYPT = 'EG';
    const EL_SALVADOR = 'SV';
    const ERITREA = 'ER';
    const ESTONIA = 'EE';
    const ETHIOPIA = 'ET';
    const FALKLAND_ISLANDS = 'FK';
    const FAROE_ISLANDS = 'FO';
    const FIJI = 'FJ';
    const FINLAND = 'FI';
    const FRANCE = 'FR';
    const FRENCH_GUIANA = 'GF';
    const FRENCH_POLYNESIA = 'PF';
    const GABON = 'GA';
    const GAMBIA = 'GM';
    const GEORGIA = 'GE';
    const GERMANY = 'DE';
    const GIBRALTAR = 'GI';
    const GREECE = 'GR';
    const GREENLAND = 'GL';
    const GRENADA = 'GD';
    const GUADELOUPE = 'GP';
    const GUATEMALA = 'GT';
    const GUINEA = 'GN';
    const GUINEA_BISSAU = 'GW';
    const GUYANA = 'GY';
    const HONDURAS = 'HN';
    const HONG_KONG_SAR_CHINA = 'HK';
    const HUNGARY = 'HU';
    const ICELAND = 'IS';
    const INDIA = 'IN';
    const INDONESIA = 'ID';
    const IRELAND = 'IE';
    const ISRAEL = 'IL';
    const ITALY = 'IT';
    const JAMAICA = 'JM';
    const JAPAN = 'JP';
    const JORDAN = 'JO';
    const KAZAKHSTAN = 'KZ';
    const KENYA = 'KE';
    const KIRIBATI = 'KI';
    const KUWAIT = 'KW';
    const KYRGYZSTAN = 'KG';
    const LAOS = 'LA';
    const LATVIA = 'LV';
    const LESOTHO = 'LS';
    const LIECHTENSTEIN = 'LI';
    const LITHUANIA = 'LT';
    const LUXEMBOURG = 'LU';
    const MACEDONIA = 'MK';
    const MADAGASCAR = 'MG';
    const MALAWI = 'MW';
    const MALAYSIA = 'MY';
    const MALDIVES = 'MV';
    const MALI = 'ML';
    const MALTA = 'MT';
    const MARSHALL_ISLANDS = 'MH';
    const MARTINIQUE = 'MQ';
    const MAURITANIA = 'MR';
    const MAURITIUS = 'MU';
    const MAYOTTE = 'YT';
    const MEXICO = 'MX';
    const MICRONESIA = 'FM';
    const MOLDOVA = 'MD';
    const MONACO = 'MC';
    const MONGOLIA = 'MN';
    const MONTENEGRO = 'ME';
    const MONTSERRAT = 'MS';
    const MOROCCO = 'MA';
    const MOZAMBIQUE = 'MZ';
    const NAMIBIA = 'NA';
    const NAURU = 'NR';
    const NEPAL = 'NP';
    const NETHERLANDS = 'NL';
    const NEW_CALEDONIA = 'NC';
    const NEW_ZEALAND = 'NZ';
    const NICARAGUA = 'NI';
    const NIGER = 'NE';
    const NIGERIA = 'NG';
    const NIUE = 'NU';
    const NORFOLK_ISLAND = 'NF';
    const NORWAY = 'NO';
    const OMAN = 'OM';
    const PALAU = 'PW';
    const PANAMA = 'PA';
    const PAPUA_NEW_GUINEA = 'PG';
    const PARAGUAY = 'PY';
    const PERU = 'PE';
    const PHILIPPINES = 'PH';
    const PITCAIRN_ISLANDS = 'PN';
    const POLAND = 'PL';
    const PORTUGAL = 'PT';
    const QATAR = 'QA';
    const REUNION = 'RE';
    const ROMANIA = 'RO';
    const RUSSIA = 'RU';
    const RWANDA = 'RW';
    const SAMOA = 'WS';
    const SAN_MARINO = 'SM';
    const SAO_TOME_AND_PRINCIPE = 'ST';
    const SAUDI_ARABIA = 'SA';
    const SENEGAL = 'SN';
    const SERBIA = 'RS';
    const SEYCHELLES = 'SC';
    const SIERRA_LEONE = 'SL';
    const SINGAPORE = 'SG';
    const SLOVAKIA = 'SK';
    const SLOVENIA = 'SI';
    const SOLOMON_ISLANDS = 'SB';
    const SOMALIA = 'SO';
    const SOUTH_AFRICA = 'ZA';
    const SOUTH_KOREA = 'KR';
    const SPAIN = 'ES';
    const SRI_LANKA = 'LK';
    const ST_HELENA = 'SH';
    const ST_KITTS_AND_NEVIS = 'KN';
    const ST_LUCIA = 'LC';
    const ST_PIERRE_AND_MIQUELON = 'PM';
    const ST_VINCENT_AND_GRENADINES = 'VC';
    const SURINAME = 'SR';
    const SVALBARD_AND_JAN_MAYEN = 'SJ';
    const SWAZILAND = 'SZ';
    const SWEDEN = 'SE';
    const SWITZERLAND = 'CH';
    const TAIWAN = 'TW';
    const TAJIKISTAN = 'TJ';
    const TANZANIA = 'TZ';
    const THAILAND = 'TH';
    const TOGO = 'TG';
    const TONGA = 'TO';
    const TRINIDAD_AND_TOBAGO = 'TT';
    const TUNISIA = 'TN';
    const TURKMENISTAN = 'TM';
    const TURKS_AND_CAICOS_ISLANDS = 'TC';
    const TUVALU = 'TV';
    const UGANDA = 'UG';
    const UKRAINE = 'UA';
    const UNITED_ARAB_EMIRATES = 'AE';
    const UNITED_KINGDOM = 'GB';
    const UNITED_STATES = 'US';
    const URUGUAY = 'UY';
    const VANUATU = 'VU';
    const VATICAN_CITY = 'VA';
    const VENEZUELA = 'VE';
    const VIETNAM = 'VN';
    const WALLIS_AND_FUTUNA = 'WF';
    const YEMEN = 'YE';
    const ZAMBIA = 'ZM';
    const ZIMBABWE = 'ZW';

    protected const COUNTRY = 'Country';
    protected const COUNTRY_CODE = 'CountryCode';
    protected const CITY = 'City';
    protected const STATE = 'State';
    protected const POSTAL_CODE = 'PostalCode';
    protected const STATES = 'States';

    protected const REQUIRED = 'Required';
    protected const OPTIONAL = 'Optional';
    protected const NOT_USED = 'Not Used';

    protected array $selected;

    protected array $data = [
        'AL' => [self::COUNTRY => 'ALBANIA', self::COUNTRY_CODE => 'AL', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'DZ' => [self::COUNTRY => 'ALGERIA', self::COUNTRY_CODE => 'DZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AD' => [self::COUNTRY => 'ANDORRA', self::COUNTRY_CODE => 'AD', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AO' => [self::COUNTRY => 'ANGOLA', self::COUNTRY_CODE => 'AO', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AI' => [self::COUNTRY => 'ANGUILLA', self::COUNTRY_CODE => 'AI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AG' => [self::COUNTRY => 'ANTIGUA & BARBUDA', self::COUNTRY_CODE => 'AG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AR' => [self::COUNTRY => 'ARGENTINA', self::COUNTRY_CODE => 'AR', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'AM' => [self::COUNTRY => 'ARMENIA', self::COUNTRY_CODE => 'AM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AW' => [self::COUNTRY => 'ARUBA', self::COUNTRY_CODE => 'AW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'AU' => [self::COUNTRY => 'AUSTRALIA', self::COUNTRY_CODE => 'AU', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'AT' => [self::COUNTRY => 'AUSTRIA', self::COUNTRY_CODE => 'AT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'AZ' => [self::COUNTRY => 'AZERBAIJAN', self::COUNTRY_CODE => 'AZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BS' => [self::COUNTRY => 'BAHAMAS', self::COUNTRY_CODE => 'BS', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BH' => [self::COUNTRY => 'BAHRAIN', self::COUNTRY_CODE => 'BH', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BB' => [self::COUNTRY => 'BARBADOS', self::COUNTRY_CODE => 'BB', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BY' => [self::COUNTRY => 'BELARUS', self::COUNTRY_CODE => 'BY', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'BE' => [self::COUNTRY => 'BELGIUM', self::COUNTRY_CODE => 'BE', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'BZ' => [self::COUNTRY => 'BELIZE', self::COUNTRY_CODE => 'BZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BJ' => [self::COUNTRY => 'BENIN', self::COUNTRY_CODE => 'BJ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BM' => [self::COUNTRY => 'BERMUDA', self::COUNTRY_CODE => 'BM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BT' => [self::COUNTRY => 'BHUTAN', self::COUNTRY_CODE => 'BT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'BO' => [self::COUNTRY => 'BOLIVIA', self::COUNTRY_CODE => 'BO', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BA' => [self::COUNTRY => 'BOSNIA & HERZEGOVINA', self::COUNTRY_CODE => 'BA', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BW' => [self::COUNTRY => 'BOTSWANA', self::COUNTRY_CODE => 'BW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BR' => [self::COUNTRY => 'BRAZIL', self::COUNTRY_CODE => 'BR', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'VG' => [self::COUNTRY => 'BRITISH VIRGIN ISLANDS', self::COUNTRY_CODE => 'VG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BN' => [self::COUNTRY => 'BRUNEI', self::COUNTRY_CODE => 'BN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'BG' => [self::COUNTRY => 'BULGARIA', self::COUNTRY_CODE => 'BG', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'BF' => [self::COUNTRY => 'BURKINA FASO', self::COUNTRY_CODE => 'BF', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'BI' => [self::COUNTRY => 'BURUNDI', self::COUNTRY_CODE => 'BI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KH' => [self::COUNTRY => 'CAMBODIA', self::COUNTRY_CODE => 'KH', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'CM' => [self::COUNTRY => 'CAMEROON', self::COUNTRY_CODE => 'CM', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::NOT_USED],
        'CA' => [self::COUNTRY => 'CANADA', self::COUNTRY_CODE => 'CA', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'CV' => [self::COUNTRY => 'CAPE VERDE', self::COUNTRY_CODE => 'CV', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KY' => [self::COUNTRY => 'CAYMAN ISLANDS', self::COUNTRY_CODE => 'KY', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TD' => [self::COUNTRY => 'CHAD', self::COUNTRY_CODE => 'TD', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'CL' => [self::COUNTRY => 'CHILE', self::COUNTRY_CODE => 'CL', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'C2' => [self::COUNTRY => 'CHINA', self::COUNTRY_CODE => 'C2', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'CO' => [self::COUNTRY => 'COLOMBIA', self::COUNTRY_CODE => 'CO', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KM' => [self::COUNTRY => 'COMOROS', self::COUNTRY_CODE => 'KM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'CG' => [self::COUNTRY => 'CONGO - BRAZZAVILLE', self::COUNTRY_CODE => 'CG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'CD' => [self::COUNTRY => 'CONGO - KINSHASA', self::COUNTRY_CODE => 'CD', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'CK' => [self::COUNTRY => 'COOK ISLANDS', self::COUNTRY_CODE => 'CK', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'CR' => [self::COUNTRY => 'COSTA RICA', self::COUNTRY_CODE => 'CR', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'CI' => [self::COUNTRY => 'CÔTE D’IVOIRE', self::COUNTRY_CODE => 'CI', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'HR' => [self::COUNTRY => 'CROATIA', self::COUNTRY_CODE => 'HR', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'CY' => [self::COUNTRY => 'CYPRUS', self::COUNTRY_CODE => 'CY', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'CZ' => [self::COUNTRY => 'CZECH REPUBLIC', self::COUNTRY_CODE => 'CZ', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'DK' => [self::COUNTRY => 'DENMARK', self::COUNTRY_CODE => 'DK', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'DJ' => [self::COUNTRY => 'DJIBOUTI', self::COUNTRY_CODE => 'DJ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'DM' => [self::COUNTRY => 'DOMINICA', self::COUNTRY_CODE => 'DM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'DO' => [self::COUNTRY => 'DOMINICAN REPUBLIC', self::COUNTRY_CODE => 'DO', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'EC' => [self::COUNTRY => 'ECUADOR', self::COUNTRY_CODE => 'EC', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'EG' => [self::COUNTRY => 'EGYPT', self::COUNTRY_CODE => 'EG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SV' => [self::COUNTRY => 'EL SALVADOR', self::COUNTRY_CODE => 'SV', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'ER' => [self::COUNTRY => 'ERITREA', self::COUNTRY_CODE => 'ER', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'EE' => [self::COUNTRY => 'ESTONIA', self::COUNTRY_CODE => 'EE', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'ET' => [self::COUNTRY => 'ETHIOPIA', self::COUNTRY_CODE => 'ET', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'FK' => [self::COUNTRY => 'FALKLAND ISLANDS', self::COUNTRY_CODE => 'FK', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'FO' => [self::COUNTRY => 'FAROE ISLANDS', self::COUNTRY_CODE => 'FO', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'FJ' => [self::COUNTRY => 'FIJI', self::COUNTRY_CODE => 'FJ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'FI' => [self::COUNTRY => 'FINLAND', self::COUNTRY_CODE => 'FI', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'FR' => [self::COUNTRY => 'FRANCE', self::COUNTRY_CODE => 'FR', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'GF' => [self::COUNTRY => 'FRENCH GUIANA', self::COUNTRY_CODE => 'GF', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'PF' => [self::COUNTRY => 'FRENCH POLYNESIA', self::COUNTRY_CODE => 'PF', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GA' => [self::COUNTRY => 'GABON', self::COUNTRY_CODE => 'GA', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GM' => [self::COUNTRY => 'GAMBIA', self::COUNTRY_CODE => 'GM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GE' => [self::COUNTRY => 'GEORGIA', self::COUNTRY_CODE => 'GE', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'DE' => [self::COUNTRY => 'GERMANY', self::COUNTRY_CODE => 'DE', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'GI' => [self::COUNTRY => 'GIBRALTAR', self::COUNTRY_CODE => 'GI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GR' => [self::COUNTRY => 'GREECE', self::COUNTRY_CODE => 'GR', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'GL' => [self::COUNTRY => 'GREENLAND', self::COUNTRY_CODE => 'GL', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'GD' => [self::COUNTRY => 'GRENADA', self::COUNTRY_CODE => 'GD', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GP' => [self::COUNTRY => 'GUADELOUPE', self::COUNTRY_CODE => 'GP', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'GT' => [self::COUNTRY => 'GUATEMALA', self::COUNTRY_CODE => 'GT', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GN' => [self::COUNTRY => 'GUINEA', self::COUNTRY_CODE => 'GN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GW' => [self::COUNTRY => 'GUINEA-BISSAU', self::COUNTRY_CODE => 'GW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'GY' => [self::COUNTRY => 'GUYANA', self::COUNTRY_CODE => 'GY', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'HN' => [self::COUNTRY => 'HONDURAS', self::COUNTRY_CODE => 'HN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'HK' => [self::COUNTRY => 'HONG KONG SAR CHINA', self::COUNTRY_CODE => 'HK', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::NOT_USED],
        'HU' => [self::COUNTRY => 'HUNGARY', self::COUNTRY_CODE => 'HU', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'IS' => [self::COUNTRY => 'ICELAND', self::COUNTRY_CODE => 'IS', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'IN' => [self::COUNTRY => 'INDIA', self::COUNTRY_CODE => 'IN', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'ID' => [self::COUNTRY => 'INDONESIA', self::COUNTRY_CODE => 'ID', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'IE' => [self::COUNTRY => 'IRELAND', self::COUNTRY_CODE => 'IE', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'IL' => [self::COUNTRY => 'ISRAEL', self::COUNTRY_CODE => 'IL', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'IT' => [self::COUNTRY => 'ITALY', self::COUNTRY_CODE => 'IT', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'JM' => [self::COUNTRY => 'JAMAICA', self::COUNTRY_CODE => 'JM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'JP' => [self::COUNTRY => 'JAPAN', self::COUNTRY_CODE => 'JP', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'JO' => [self::COUNTRY => 'JORDAN', self::COUNTRY_CODE => 'JO', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KZ' => [self::COUNTRY => 'KAZAKHSTAN', self::COUNTRY_CODE => 'KZ', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'KE' => [self::COUNTRY => 'KENYA', self::COUNTRY_CODE => 'KE', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KI' => [self::COUNTRY => 'KIRIBATI', self::COUNTRY_CODE => 'KI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KW' => [self::COUNTRY => 'KUWAIT', self::COUNTRY_CODE => 'KW', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'KG' => [self::COUNTRY => 'KYRGYZSTAN', self::COUNTRY_CODE => 'KG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'LA' => [self::COUNTRY => 'LAOS', self::COUNTRY_CODE => 'LA', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'LV' => [self::COUNTRY => 'LATVIA', self::COUNTRY_CODE => 'LV', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'LS' => [self::COUNTRY => 'LESOTHO', self::COUNTRY_CODE => 'LS', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'LI' => [self::COUNTRY => 'LIECHTENSTEIN', self::COUNTRY_CODE => 'LI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'LT' => [self::COUNTRY => 'LITHUANIA', self::COUNTRY_CODE => 'LT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'LU' => [self::COUNTRY => 'LUXEMBOURG', self::COUNTRY_CODE => 'LU', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MK' => [self::COUNTRY => 'MACEDONIA', self::COUNTRY_CODE => 'MK', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'MG' => [self::COUNTRY => 'MADAGASCAR', self::COUNTRY_CODE => 'MG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MW' => [self::COUNTRY => 'MALAWI', self::COUNTRY_CODE => 'MW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MY' => [self::COUNTRY => 'MALAYSIA', self::COUNTRY_CODE => 'MY', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'MV' => [self::COUNTRY => 'MALDIVES', self::COUNTRY_CODE => 'MV', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'ML' => [self::COUNTRY => 'MALI', self::COUNTRY_CODE => 'ML', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MT' => [self::COUNTRY => 'MALTA', self::COUNTRY_CODE => 'MT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MH' => [self::COUNTRY => 'MARSHALL ISLANDS', self::COUNTRY_CODE => 'MH', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MQ' => [self::COUNTRY => 'MARTINIQUE', self::COUNTRY_CODE => 'MQ', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MR' => [self::COUNTRY => 'MAURITANIA', self::COUNTRY_CODE => 'MR', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MU' => [self::COUNTRY => 'MAURITIUS', self::COUNTRY_CODE => 'MU', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'YT' => [self::COUNTRY => 'MAYOTTE', self::COUNTRY_CODE => 'YT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MX' => [self::COUNTRY => 'MEXICO', self::COUNTRY_CODE => 'MX', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'FM' => [self::COUNTRY => 'MICRONESIA', self::COUNTRY_CODE => 'FM', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'MD' => [self::COUNTRY => 'MOLDOVA', self::COUNTRY_CODE => 'MD', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'MC' => [self::COUNTRY => 'MONACO', self::COUNTRY_CODE => 'MC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MN' => [self::COUNTRY => 'MONGOLIA', self::COUNTRY_CODE => 'MN', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'ME' => [self::COUNTRY => 'MONTENEGRO', self::COUNTRY_CODE => 'ME', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MS' => [self::COUNTRY => 'MONTSERRAT', self::COUNTRY_CODE => 'MS', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'MA' => [self::COUNTRY => 'MOROCCO', self::COUNTRY_CODE => 'MA', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'MZ' => [self::COUNTRY => 'MOZAMBIQUE', self::COUNTRY_CODE => 'MZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NA' => [self::COUNTRY => 'NAMIBIA', self::COUNTRY_CODE => 'NA', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NR' => [self::COUNTRY => 'NAURU', self::COUNTRY_CODE => 'NR', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NP' => [self::COUNTRY => 'NEPAL', self::COUNTRY_CODE => 'NP', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'NL' => [self::COUNTRY => 'NETHERLANDS', self::COUNTRY_CODE => 'NL', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'NC' => [self::COUNTRY => 'NEW CALEDONIA', self::COUNTRY_CODE => 'NC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NZ' => [self::COUNTRY => 'NEW ZEALAND', self::COUNTRY_CODE => 'NZ', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'NI' => [self::COUNTRY => 'NICARAGUA', self::COUNTRY_CODE => 'NI', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NE' => [self::COUNTRY => 'NIGER', self::COUNTRY_CODE => 'NE', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NG' => [self::COUNTRY => 'NIGERIA', self::COUNTRY_CODE => 'NG', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'NU' => [self::COUNTRY => 'NIUE', self::COUNTRY_CODE => 'NU', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NF' => [self::COUNTRY => 'NORFOLK ISLAND', self::COUNTRY_CODE => 'NF', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'NO' => [self::COUNTRY => 'NORWAY', self::COUNTRY_CODE => 'NO', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'OM' => [self::COUNTRY => 'OMAN', self::COUNTRY_CODE => 'OM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'PW' => [self::COUNTRY => 'PALAU', self::COUNTRY_CODE => 'PW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'PA' => [self::COUNTRY => 'PANAMA', self::COUNTRY_CODE => 'PA', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'PG' => [self::COUNTRY => 'PAPUA NEW GUINEA', self::COUNTRY_CODE => 'PG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'PY' => [self::COUNTRY => 'PARAGUAY', self::COUNTRY_CODE => 'PY', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'PE' => [self::COUNTRY => 'PERU', self::COUNTRY_CODE => 'PE', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'PH' => [self::COUNTRY => 'PHILIPPINES', self::COUNTRY_CODE => 'PH', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'PN' => [self::COUNTRY => 'PITCAIRN ISLANDS', self::COUNTRY_CODE => 'PN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'PL' => [self::COUNTRY => 'POLAND', self::COUNTRY_CODE => 'PL', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'PT' => [self::COUNTRY => 'PORTUGAL', self::COUNTRY_CODE => 'PT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'QA' => [self::COUNTRY => 'QATAR', self::COUNTRY_CODE => 'QA', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::NOT_USED],
        'RE' => [self::COUNTRY => 'RÉUNION', self::COUNTRY_CODE => 'RE', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'RO' => [self::COUNTRY => 'ROMANIA', self::COUNTRY_CODE => 'RO', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'RU' => [self::COUNTRY => 'RUSSIA', self::COUNTRY_CODE => 'RU', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'RW' => [self::COUNTRY => 'RWANDA', self::COUNTRY_CODE => 'RW', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'WS' => [self::COUNTRY => 'SAMOA', self::COUNTRY_CODE => 'WS', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'SM' => [self::COUNTRY => 'SAN MARINO', self::COUNTRY_CODE => 'SM', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'ST' => [self::COUNTRY => 'SÃO TOMÉ & PRÍNCIPE', self::COUNTRY_CODE => 'ST', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SA' => [self::COUNTRY => 'SAUDI ARABIA', self::COUNTRY_CODE => 'SA', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'SN' => [self::COUNTRY => 'SENEGAL', self::COUNTRY_CODE => 'SN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'RS' => [self::COUNTRY => 'SERBIA', self::COUNTRY_CODE => 'RS', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'SC' => [self::COUNTRY => 'SEYCHELLES', self::COUNTRY_CODE => 'SC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SL' => [self::COUNTRY => 'SIERRA LEONE', self::COUNTRY_CODE => 'SL', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SG' => [self::COUNTRY => 'SINGAPORE', self::COUNTRY_CODE => 'SG', self::CITY => self::NOT_USED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'SK' => [self::COUNTRY => 'SLOVAKIA', self::COUNTRY_CODE => 'SK', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'SI' => [self::COUNTRY => 'SLOVENIA', self::COUNTRY_CODE => 'SI', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'SB' => [self::COUNTRY => 'SOLOMON ISLANDS', self::COUNTRY_CODE => 'SB', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SO' => [self::COUNTRY => 'SOMALIA', self::COUNTRY_CODE => 'SO', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'ZA' => [self::COUNTRY => 'SOUTH AFRICA', self::COUNTRY_CODE => 'ZA', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'KR' => [self::COUNTRY => 'SOUTH KOREA', self::COUNTRY_CODE => 'KR', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'ES' => [self::COUNTRY => 'SPAIN', self::COUNTRY_CODE => 'ES', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'LK' => [self::COUNTRY => 'SRI LANKA', self::COUNTRY_CODE => 'LK', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'SH' => [self::COUNTRY => 'ST. HELENA', self::COUNTRY_CODE => 'SH', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'KN' => [self::COUNTRY => 'ST. KITTS & NEVIS', self::COUNTRY_CODE => 'KN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'LC' => [self::COUNTRY => 'ST. LUCIA', self::COUNTRY_CODE => 'LC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'PM' => [self::COUNTRY => 'ST. PIERRE & MIQUELON', self::COUNTRY_CODE => 'PM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'VC' => [self::COUNTRY => 'ST. VINCENT & GRENADINES', self::COUNTRY_CODE => 'VC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SR' => [self::COUNTRY => 'SURINAME', self::COUNTRY_CODE => 'SR', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SJ' => [self::COUNTRY => 'SVALBARD & JAN MAYEN', self::COUNTRY_CODE => 'SJ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SZ' => [self::COUNTRY => 'SWAZILAND', self::COUNTRY_CODE => 'SZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'SE' => [self::COUNTRY => 'SWEDEN', self::COUNTRY_CODE => 'SE', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'CH' => [self::COUNTRY => 'SWITZERLAND', self::COUNTRY_CODE => 'CH', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'TW' => [self::COUNTRY => 'TAIWAN', self::COUNTRY_CODE => 'TW', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'TJ' => [self::COUNTRY => 'TAJIKISTAN', self::COUNTRY_CODE => 'TJ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TZ' => [self::COUNTRY => 'TANZANIA', self::COUNTRY_CODE => 'TZ', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TH' => [self::COUNTRY => 'THAILAND', self::COUNTRY_CODE => 'TH', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'TG' => [self::COUNTRY => 'TOGO', self::COUNTRY_CODE => 'TG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TO' => [self::COUNTRY => 'TONGA', self::COUNTRY_CODE => 'TO', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::NOT_USED],
        'TT' => [self::COUNTRY => 'TRINIDAD & TOBAGO', self::COUNTRY_CODE => 'TT', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::OPTIONAL],
        'TN' => [self::COUNTRY => 'TUNISIA', self::COUNTRY_CODE => 'TN', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TM' => [self::COUNTRY => 'TURKMENISTAN', self::COUNTRY_CODE => 'TM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TC' => [self::COUNTRY => 'TURKS & CAICOS ISLANDS', self::COUNTRY_CODE => 'TC', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'TV' => [self::COUNTRY => 'TUVALU', self::COUNTRY_CODE => 'TV', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'UG' => [self::COUNTRY => 'UGANDA', self::COUNTRY_CODE => 'UG', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'UA' => [self::COUNTRY => 'UKRAINE', self::COUNTRY_CODE => 'UA', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'AE' => [self::COUNTRY => 'UNITED ARAB EMIRATES', self::COUNTRY_CODE => 'AE', self::CITY => self::OPTIONAL, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::NOT_USED],
        'GB' => [self::COUNTRY => 'UNITED KINGDOM', self::COUNTRY_CODE => 'GB', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::REQUIRED],
        'US' => [self::COUNTRY => 'UNITED STATES', self::COUNTRY_CODE => 'US', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'UY' => [self::COUNTRY => 'URUGUAY', self::COUNTRY_CODE => 'UY', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::REQUIRED],
        'VU' => [self::COUNTRY => 'VANUATU', self::COUNTRY_CODE => 'VU', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'VA' => [self::COUNTRY => 'VATICAN CITY', self::COUNTRY_CODE => 'VA', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::REQUIRED],
        'VE' => [self::COUNTRY => 'VENEZUELA', self::COUNTRY_CODE => 'VE', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'VN' => [self::COUNTRY => 'VIETNAM', self::COUNTRY_CODE => 'VN', self::CITY => self::REQUIRED, self::STATE => self::REQUIRED, self::POSTAL_CODE => self::OPTIONAL],
        'WF' => [self::COUNTRY => 'WALLIS & FUTUNA', self::COUNTRY_CODE => 'WF', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'YE' => [self::COUNTRY => 'YEMEN', self::COUNTRY_CODE => 'YE', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'ZM' => [self::COUNTRY => 'ZAMBIA', self::COUNTRY_CODE => 'ZM', self::CITY => self::REQUIRED, self::STATE => self::OPTIONAL, self::POSTAL_CODE => self::OPTIONAL],
        'ZW' => [self::COUNTRY => 'ZIMBABWE', self::COUNTRY_CODE => 'ZW', self::CITY => self::REQUIRED, self::STATE => self::NOT_USED, self::POSTAL_CODE => self::NOT_USED],
    ];

    /**
     * @throws ValueOutOfBoundsException
     */
    public function __construct(string $countryCode)
    {
        if (array_key_exists($countryCode, $this->data))
        {
            $this->selected = $this->data[$countryCode];

            if ($this->isStateRequired())
            {
                $this->selected[self::STATES] = StateCodes::getStates($countryCode);
            }
        } else {
            throw new ValueOutOfBoundsException($countryCode);
        }
    }

    public function getCountryName(): string
    {
        return $this->selected[self::COUNTRY];
    }

    public function getCountryCode(): string
    {
        return $this->selected[self::COUNTRY_CODE];
    }

    public function isCityRequired(): bool
    {
        return $this->selected[self::CITY] == self::REQUIRED;
    }

    public function isStateRequired(): bool
    {
        return $this->selected[self::STATE] == self::REQUIRED;
    }

    public function isPostalCodeRequired(): bool
    {
        return $this->selected[self::POSTAL_CODE] == self::REQUIRED;
    }

    public function getSelected(): array
    {
        return $this->selected;
    }

    /**
     * @return array|\string[][]
     */
    public function getData(): array
    {
        return $this->data;
    }
}

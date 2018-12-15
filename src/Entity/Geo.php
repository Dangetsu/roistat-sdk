<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity;

/**
 * @method string getCountry()
 * @method string getRegion()
 * @method string getCity()
 * @method string getIconUrl()
 * @method string getCountryIso()
 */
class Geo extends AbstractEntity {
    /** @var string */
    protected $country;
    /** @var string */
    protected $region;
    /** @var string */
    protected $city;
    /** @var string */
    protected $icon_url;
    /** @var string */
    protected $country_iso;
}
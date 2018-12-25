<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Visit;

use Analytics\Entity;

/**
 * @method string getReferrer()
 * @method string getSystemName()
 * @method string getDisplayName()
 * @method string getIconUrl()
 * @method string getUtmSource()
 * @method string getUtmMedium()
 * @method string getUtmCampaign()
 * @method string getUtmTerm()
 * @method string getUtmContent()
 * @method string getOpenstat()
 */
class Source extends Entity\AbstractEntity {

    /** @var string */
    protected $referrer;

    /** @var string */
    protected $system_name;

    /** @var string */
    protected $display_name;

    /** @var string */
    protected $icon_url;

    /** @var string */
    protected $utm_source;

    /** @var string */
    protected $utm_medium;

    /** @var string */
    protected $utm_campaign;

    /** @var string */
    protected $utm_term;

    /** @var string */
    protected $utm_content;

    /** @var string */
    protected $openstat;

}
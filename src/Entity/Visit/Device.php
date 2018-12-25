<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Visit;

use Analytics\Entity;

/**
 * @method string getOs()
 * @method string getOsIcon()
 * @method string getAgent()
 * @method string getAgentIcon()
 */
class Device extends Entity\AbstractEntity {

    /** @var string */
    protected $os;

    /** @var string */
    protected $os_icon;

    /** @var string */
    protected $agent;

    /** @var string */
    protected $agent_icon;

}
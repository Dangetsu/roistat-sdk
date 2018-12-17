<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Options;

use Analytics\Entity;

/**
 * @method string getType()
 * @method string getValue()
 * @method string getSipTrunkPostfix()
 */
class Redirect extends Entity\AbstractEntity {
    /** @var string */
    protected $type;
    /** @var string */
    protected $value;
    /** @var string */
    protected $sip_trunk_postfix;
}
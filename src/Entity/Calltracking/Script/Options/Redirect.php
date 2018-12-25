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
 * @method Redirect setType(string $value)
 * @method Redirect setValue(string $value)
 */
class Redirect extends Entity\AbstractEntity {

    /** @var string */
    protected $type;

    /** @var string */
    protected $value;

    /** @var string */
    protected $sip_trunk_postfix;

}
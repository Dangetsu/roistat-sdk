<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script\Integration\Crm;

use Analytics\Entity;

/**
 * @method string getType()
 * @method array getValue()
 */
class CustomFields extends Entity\AbstractEntity {
    /** @var string */
    protected $type;
    /** @var string */
    protected $value;
}
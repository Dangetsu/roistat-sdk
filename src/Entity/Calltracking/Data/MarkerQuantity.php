<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method string getDisplayName()
 * @method int getValue()
 * @method string getSystemName()
 */
class MarkerQuantity extends Entity\AbstractEntity {

    /** @var string */
    protected $displayName;

    /** @var int */
    protected $value;

    /** @var string */
    protected $systemName;

}
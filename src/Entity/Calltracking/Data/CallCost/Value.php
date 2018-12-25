<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data\CallCost;

use Analytics\Entity;

/**
 * @method int getValue()
 * @method string getDate()
 */
class Value extends Entity\AbstractEntity {

    /** @var int */
    protected $value;

    /** @var string */
    protected $date;

}
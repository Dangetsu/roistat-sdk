<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method CallCost\Value[] getValues()
 * @method float getAverage()
 */
class CallCost extends Entity\AbstractEntity {
    /** @var CallCost\Value[] */
    protected $values = 'CallCost\\Value[]';
    /** @var float */
    protected $average;
}
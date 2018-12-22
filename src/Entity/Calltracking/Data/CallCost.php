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
    /** @var array */
    protected $_entityFields = [
        'values' => 'CallCost\\Value[]',
    ];
    /** @var CallCost\Value[] */
    protected $values;
    /** @var float */
    protected $average;
}
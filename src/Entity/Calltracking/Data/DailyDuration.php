<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method DailyDuration\Value[] getValues()
 * @method float getAverage()
 */
class DailyDuration extends Entity\AbstractEntity {
    /** @var array */
    protected $_entityFields = [
        'values' => 'DailyDuration\\Value[]',
    ];
    /** @var DailyDuration\Value[] */
    protected $values;
    /** @var float */
    protected $average;
}
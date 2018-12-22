<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method DailyQuantity\Value[] getValues()
 * @method float getAverage()
 */
class DailyQuantity extends Entity\AbstractEntity {
    /** @var array */
    protected $_entityFields = [
        'values' => 'DailyQuantity\\Value[]',
    ];
    /** @var DailyQuantity\Value[] */
    protected $values;
    /** @var float */
    protected $average;
}
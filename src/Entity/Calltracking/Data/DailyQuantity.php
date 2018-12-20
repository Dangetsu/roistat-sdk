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
    /** @var DailyQuantity\Value[] */
    protected $values = 'DailyQuantity\\Value[]';
    /** @var float */
    protected $average;
}
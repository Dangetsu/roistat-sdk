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
    /** @var DailyDuration\Value[] */
    protected $values = 'DailyDuration\\Value[]';
    /** @var float */
    protected $average;
}
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
    protected $values;

    /** @var float */
    protected $average;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'values':
                return ['class' => DailyDuration\Value::getClass(), 'is_multiple' => true];
                break;
        }
        return null;
    }
}
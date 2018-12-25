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
                return ['class' => DailyQuantity\Value::getClass(), 'is_multiple' => true];
                break;
        }
        return null;
    }
}
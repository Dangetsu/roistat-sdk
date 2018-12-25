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
                return ['class' => CallCost\Value::getClass(), 'is_multiple' => true];
                break;
        }
        return null;
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method HourlyWeeklyQuantity\ByHours[] getByHours()
 * @method HourlyWeeklyQuantity\ByWeekdays[] getByWeekdays()
 * @method int getTotal()
 */
class HourlyWeeklyQuantity extends Entity\AbstractEntity {

    /** @var HourlyWeeklyQuantity\ByHours[] */
    protected $byHours;

    /** @var HourlyWeeklyQuantity\ByWeekdays[] */
    protected $byWeekdays;

    /** @var int */
    protected $total;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'byHours':
                return ['class' => HourlyWeeklyQuantity\ByHours::getClass(), 'is_multiple' => true];
                break;
            case 'byWeekdays':
                return ['class' => HourlyWeeklyQuantity\ByWeekdays::getClass(), 'is_multiple' => true];
                break;
        }
        return null;
    }
}
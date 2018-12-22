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
    /** @var array */
    protected $_entityFields = [
        'byHours' => 'HourlyWeeklyQuantity\\ByHours[]',
        'byWeekdays' => 'HourlyWeeklyQuantity\\ByWeekdays[]',
    ];
    /** @var HourlyWeeklyQuantity\ByHours[] */
    protected $byHours;
    /** @var HourlyWeeklyQuantity\ByWeekdays[] */
    protected $byWeekdays;
    /** @var int */
    protected $total;
}
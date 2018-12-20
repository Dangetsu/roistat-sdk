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
    protected $byHours = 'HourlyWeeklyQuantity\\ByHours[]';
    /** @var HourlyWeeklyQuantity\ByWeekdays[] */
    protected $byWeekdays = 'HourlyWeeklyQuantity\\ByWeekdays[]';
    /** @var int */
    protected $total;
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data\HourlyWeeklyQuantity;

use Analytics\Entity;

/**
 * @method int getSuccess()
 * @method int getMissed()
 * @method string getDate()
 */
class ByWeekdays extends Entity\AbstractEntity {
    /** @var int */
    protected $success;
    /** @var int */
    protected $missed;
    /** @var string */
    protected $date;
}
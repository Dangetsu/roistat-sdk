<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Data;

use Analytics\Entity;

/**
 * @method string getStartDate()
 * @method string getEndDate()
 */
class Period extends Entity\AbstractEntity {

    /** @var string */
    protected $startDate;

    /** @var string */
    protected $endDate;

}
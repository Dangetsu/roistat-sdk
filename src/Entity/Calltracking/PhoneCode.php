<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;

/**
 * @method string getSystemName()
 * @method string getDisplayName()
 * @method string getCity()
 * @method float getMonthPrice()
 * @method float getMinutePrice()
 */
class PhoneCode extends Entity\AbstractEntity {

    /** @var string */
    protected $system_name;

    /** @var string */
    protected $display_name;

    /** @var string */
    protected $city;

    /** @var float */
    protected $month_price;

    /** @var float */
    protected $minute_price;

}
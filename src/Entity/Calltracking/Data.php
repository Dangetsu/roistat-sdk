<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking;

use Analytics\Entity;

/**
 * @method Data\Period getPeriod()
 * @method Data\HourlyWeeklyQuantity getHourlyWeeklyQuantity()
 * @method Data\DailyDuration getDailyDuration()
 * @method Data\DailyQuantity getDailyQuantity()
 * @method Data\MarkerQuantity[] getMarkerQuantity()
 * @method Data\MarkerDuration[] getMarkerDuration()
 * @method Data\RegionQuantity[] getRegionQuantity()
 * @method Data\CallCost getCallCost()
 */
class Data extends Entity\AbstractEntity {
    /** @var Data\Period */
    protected $period = 'Data\\Period';
    /** @var Data\HourlyWeeklyQuantity */
    protected $hourlyWeeklyQuantity = 'Data\\HourlyWeeklyQuantity';
    /** @var Data\DailyDuration */
    protected $dailyDuration = 'Data\\DailyDuration';
    /** @var Data\DailyQuantity */
    protected $dailyQuantity = 'Data\\DailyQuantity';
    /** @var Data\MarkerQuantity[] */
    protected $markerQuantity = 'Data\\MarkerQuantity[]';
    /** @var Data\MarkerDuration[] */
    protected $markerDuration = 'Data\\MarkerDuration[]';
    /** @var Data\RegionQuantity[] */
    protected $regionQuantity = 'Data\\RegionQuantity[]';
    /** @var Data\CallCost */
    protected $callCost = 'Data\\CallCost';
}
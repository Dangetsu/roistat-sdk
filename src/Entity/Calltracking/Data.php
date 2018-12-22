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
    /** @var array */
    protected $_entityFields = [
        'period'               => 'Data\\Period',
        'hourlyWeeklyQuantity' => 'Data\\HourlyWeeklyQuantity',
        'dailyDuration'        => 'Data\\DailyDuration',
        'dailyQuantity'        => 'Data\\DailyQuantity',
        'markerQuantity'       => 'Data\\MarkerQuantity[]',
        'markerDuration'       => 'Data\\MarkerDuration[]',
        'regionQuantity'       => 'Data\\RegionQuantity[]',
        'callCost'             => 'Data\\CallCost',
    ];
    /** @var Data\Period */
    protected $period;
    /** @var Data\HourlyWeeklyQuantity */
    protected $hourlyWeeklyQuantity;
    /** @var Data\DailyDuration */
    protected $dailyDuration;
    /** @var Data\DailyQuantity */
    protected $dailyQuantity;
    /** @var Data\MarkerQuantity[] */
    protected $markerQuantity;
    /** @var Data\MarkerDuration[] */
    protected $markerDuration;
    /** @var Data\RegionQuantity[] */
    protected $regionQuantity;
    /** @var Data\CallCost */
    protected $callCost;
}
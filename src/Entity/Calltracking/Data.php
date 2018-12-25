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

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'period':
                return ['class' => Data\Period::getClass(), 'is_multiple' => false];
                break;
            case 'hourlyWeeklyQuantity':
                return ['class' => Data\HourlyWeeklyQuantity::getClass(), 'is_multiple' => false];
                break;
            case 'dailyDuration':
                return ['class' => Data\DailyDuration::getClass(), 'is_multiple' => false];
                break;
            case 'dailyQuantity':
                return ['class' => Data\DailyQuantity::getClass(), 'is_multiple' => false];
                break;
            case 'markerQuantity':
                return ['class' => Data\MarkerQuantity::getClass(), 'is_multiple' => true];
                break;
            case 'markerDuration':
                return ['class' => Data\MarkerDuration::getClass(), 'is_multiple' => true];
                break;
            case 'regionQuantity':
                return ['class' => Data\RegionQuantity::getClass(), 'is_multiple' => true];
                break;
            case 'callCost':
                return ['class' => Data\CallCost::getClass(), 'is_multiple' => false];
                break;
        }
        return null;
    }
}
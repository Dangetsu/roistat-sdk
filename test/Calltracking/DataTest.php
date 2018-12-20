<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Calltracking;

use Analytics\Scheme;
use Analytics\Engine\Exception;

class DataTest extends \Test\AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('Calltracking/DataList'));
        $this->_roistat->api()->addMockHandler($handler);
        $data = (new Scheme\Calltracking\Data($this->_roistat))->items(new \DateTime('2016-06-30T21:00:00+0000'), new \DateTime('2016-10-31T20:59:59+0000'));

        $period = $data->getPeriod();
        $this->assertSame('2016-06-30T21:00:00+0000', $period->getStartDate());
        $this->assertSame('2016-10-31T20:59:59+0000', $period->getEndDate());
        $hourlyWeeklyQuantity = $data->getHourlyWeeklyQuantity();
        $byHours = $hourlyWeeklyQuantity->getByHours();
        $this->assertSame(0, $byHours[0]->getSuccess());
        $this->assertSame(0, $byHours[0]->getMissed());
        $this->assertSame('01', $byHours[0]->getHour());
        $byWeekdays = $hourlyWeeklyQuantity->getByWeekdays();
        $this->assertSame(0, $byWeekdays[0]->getSuccess());
        $this->assertSame(0, $byWeekdays[0]->getMissed());
        $this->assertSame('2016-10-30T00:00:00+0000', $byWeekdays[0]->getDate());
        $this->assertSame(39, $hourlyWeeklyQuantity->getTotal());
        $dailyDuration = $data->getDailyDuration();
        $this->assertSame(0.23418803418803, $dailyDuration->getAverage());
        $dailyDurationValues = $dailyDuration->getValues();
        $this->assertSame(0, $dailyDurationValues[0]->getValue());
        $this->assertSame('2016-10-30T00:00:00+0000', $dailyDurationValues[0]->getDate());
        $dailyQuantity = $data->getDailyQuantity();
        $this->assertSame(0.31451612903226, $dailyQuantity->getAverage());
        $dailyQuantityValues = $dailyQuantity->getValues();
        $this->assertSame(0, $dailyQuantityValues[0]->getValue());
        $this->assertSame('2016-10-30T00:00:00+0000', $dailyQuantityValues[0]->getDate());
        $markerQuantity = $data->getMarkerQuantity();
        $this->assertSame('Прямые визиты', $markerQuantity[0]->getDisplayName());
        $this->assertSame('', $markerQuantity[0]->getSystemName());
        $this->assertSame(17, $markerQuantity[0]->getValue());
        $markerDuration = $data->getMarkerDuration();
        $this->assertSame('yandex', $markerDuration[0]->getDisplayName());
        $this->assertSame('', $markerDuration[0]->getIconUrl());
        $this->assertSame('yandex', $markerDuration[0]->getSystemName());
        $this->assertSame(7.5, $markerDuration[0]->getValue());
        $regionQuantity = $data->getRegionQuantity();
        $this->assertSame('Москва', $regionQuantity[0]->getDisplayName());
        $this->assertSame(21, $regionQuantity[0]->getValue());
        $callCost = $data->getCallCost();
        $this->assertSame(80.725774193548, $callCost->getAverage());
        $callCostValues = $callCost->getValues();
        $this->assertSame(0, $callCostValues[0]->getValue());
        $this->assertSame('2016-10-30T00:00:00+0000', $callCostValues[0]->getDate());
    }
}
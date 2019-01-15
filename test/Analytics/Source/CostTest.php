<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Analytics\Source;

use Analytics\Scheme;
use Analytics\Entity\Analytics\Source;

class CostTest extends \Test\AbstractTest {
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('Analytics/Source/CostList'));
        $this->_roistat->api()->addMockHandler($handler);
        $costs = (new Scheme\Analytics\Source\Cost($this->_roistat))->items();
        $this->assertSame(1, count($costs));

        $cost = $costs[0];
        $this->assertSame('123', $cost->getId());
        $this->assertSame('yandex_seo_test', $cost->getSource());
        $this->assertSame('Yandex -> SEO -> Test', $cost->getName());
        $this->assertSame('2016-07-01', $cost->getFromDate());
        $this->assertSame('2016-07-31', $cost->getToDate());
        $this->assertSame('Europe/Moscow', $cost->getTimezone());
        $this->assertSame(500, $cost->getMarketingCost());
    }

    public function testCreate() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse(['status' => 'success']));
        $cost = (new Source\Cost())
            ->setSource('yandex_seo_test')
            ->setName('Yandex -> SEO -> Test')
            ->setFromDate('2016-07-01')
            ->setToDate('2016-07-31')
            ->setTimezone('Europe/Moscow')
            ->setMarketingCost(500);
        $isSave = (new Scheme\Analytics\Source\Cost($this->_roistat))->create($cost);
        $this->assertTrue($isSave);
    }
}
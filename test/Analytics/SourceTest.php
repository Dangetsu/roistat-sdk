<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Analytics;

use Analytics\Scheme;

class SourceTest extends \Test\AbstractTest {
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('Analytics/SourceList'));
        $this->_roistat->api()->addMockHandler($handler);
        $sources = (new Scheme\Analytics\Source($this->_roistat))->items();
        $this->assertSame(2, count($sources));

        $source = $sources[0];
        $this->assertSame('yandex', $source->getSource());
        $this->assertSame('Яндекс', $source->getName());
        $this->assertSame('system', $source->getType());
        $this->assertSame(1, $source->getLevel());
        $this->assertSame('http://test.ru/logo.png', $source->getIcon());
    }
}
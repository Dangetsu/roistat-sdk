<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Engine;

class SiteVisitTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('SiteVisitList'));
        $this->_roistat->addMockHandler($handler);
        $visits = $this->_roistat->SiteVisit()->items((new Engine\Query())->addFilter('host', '=', 'open-cart21')->setLimit(1));
        $this->assertSame(1, count($visits));

        $visit = $visits[0];
        $this->assertSame('1001', $visit->getId());
        $this->assertSame('1000', $visit->getFirstVisitId());
        $this->assertSame('2018-01-26T11:23:15+0000', $visit->getDate());
        $this->assertSame('open-cart21', $visit->getLandingPage());
        $this->assertSame('open-cart21', $visit->getHost());
        $this->assertSame('google_client_id', $visit->getGoogleClientId());
        $this->assertSame('metrika_client_id', $visit->getMetrikaClientId());
        $this->assertSame('217.175.0.85', $visit->getIp());
        $this->assertSame('roistat_param1', $visit->getRoistatParam1());
        $this->assertSame('roistat_param2', $visit->getRoistatParam2());
        $this->assertSame('roistat_param3', $visit->getRoistatParam3());
        $this->assertSame('roistat_param4', $visit->getRoistatParam4());
        $this->assertSame('roistat_param5', $visit->getRoistatParam5());
        $this->assertSame('roistat_param5', $visit->getRoistatParam5());
        // todo: after create new entity Device, Source, Geo
        $this->assertSame(2, count($visit->getOrderIds()));
        $this->assertSame(1, $visit->getOrderIds()[0]);
    }
}
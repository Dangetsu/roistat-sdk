<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Engine;
use Analytics\Scheme;

class VisitTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('VisitList'));
        $this->_roistat->api()->addMockHandler($handler);
        $visits = (new Scheme\Visit($this->_roistat))->items((new Engine\Query())->addFilter('host', '=', 'open-cart21')->setLimit(1));
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
        $device = $visit->getDevice();
        $this->assertSame('Windows 10 x64', $device->getOs());
        $this->assertSame('https://cloud.roistat.com/img/os/windows.png', $device->getOsIcon());
        $this->assertSame('Yandex Browser 17.11 browser Blink', $device->getAgent());
        $this->assertSame('https://cloud.roistat.com/img/browsers/Yandex.Browser.png', $device->getAgentIcon());
        $source = $visit->getSource();
        $this->assertSame('referrer', $source->getReferrer());
        $this->assertSame('system_name', $source->getSystemName());
        $this->assertSame('Прямые визиты', $source->getDisplayName());
        $this->assertSame('https://cloud.roistat.com/img/arrow-right.png', $source->getIconUrl());
        $this->assertSame('utm_source', $source->getUtmSource());
        $this->assertSame('utm_medium', $source->getUtmMedium());
        $this->assertSame('utm_campaign', $source->getUtmCampaign());
        $this->assertSame('utm_term', $source->getUtmTerm());
        $this->assertSame('utm_content', $source->getUtmContent());
        $this->assertSame('openstat', $source->getOpenstat());
        $geo = $visit->getGeo();
        $this->assertSame('Украина', $geo->getCountry());
        $this->assertSame('Республика Крым', $geo->getRegion());
        $this->assertSame('Керчь', $geo->getCity());
        $this->assertSame('/img/country/ua.png', $geo->getIconUrl());
        $this->assertSame('UA', $geo->getCountryIso());

        $this->assertSame(2, count($visit->getOrderIds()));
        $this->assertSame(1, $visit->getOrderIds()[0]);
    }
}
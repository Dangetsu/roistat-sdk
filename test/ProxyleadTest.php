<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Entity;
use Analytics\Scheme;

class ProxyleadTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('ProxyleadList'));
        $this->_roistat->api()->addMockHandler($handler);
        $leads = (new Scheme\Proxylead($this->_roistat))->items(new \DateTime('2015-12-12'), new \DateTime());
        $this->assertSame(2, count($leads));
        $this->_assertLead($leads[0]);
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testGet() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('ProxyleadGet'));
        $this->_roistat->api()->addMockHandler($handler);
        $lead = (new Scheme\Proxylead($this->_roistat))->get('2');
        $this->_assertLead($lead);
    }

    /**
     * @param Entity\Proxylead $lead
     */
    private function _assertLead(Entity\Proxylead $lead) {
        $this->assertSame('2', $lead->getId());
        $this->assertSame('Лид с формы заказать звонок', $lead->getTitle());
        $this->assertSame('Прошу перезвонить', $lead->getText());
        $this->assertSame('Питер Пен', $lead->getName());
        $this->assertSame('71234567890', $lead->getPhone());
        $this->assertSame('peter@yandex.ru', $lead->getEmail());
        $this->assertSame('1000', $lead->getRoistat());
        $this->assertSame('2016-07-12 14:51:39', $lead->getCreationDate());
        $this->assertSame('12346', $lead->getOrderId());
        $this->assertSame(['cost_field_id' => '200'], $lead->getOrderFields());
    }
}
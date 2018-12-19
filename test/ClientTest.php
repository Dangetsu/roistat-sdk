<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Scheme;
use Analytics\Entity;

class ClientTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('ClientList'));
        $this->_roistat->addMockHandler($handler);
        $clients = (new Scheme\Client($this->_roistat))->items();
        $this->assertSame(2, count($clients));

        $client = $clients[0];
        $this->assertSame(7, $client->getId());
        $this->assertSame('Имя клиента', $client->getName());
        $this->assertSame('79880002233', $client->getPhone());
        $this->assertSame('test@roistat.test', $client->getEmail());
        $this->assertSame('1018-01-01', $client->getBirthDate());
        $this->assertSame('http://example.crm.com/contacts/105', $client->getClientUrl());
        $this->assertSame('test', $client->getComment());
        $this->assertSame('roistat', $client->getCompany());
        $this->assertSame('105', $client->getExternalId());
        $this->assertSame('2018-01-02 00:00:00', $client->getFirstOrderDate());
        $this->assertSame('2018-01-03 00:00:00', $client->getLastOrderDate());
        $this->assertSame('2018-01-01 00:00:00', $client->getFirstVisitDate());
        $this->assertSame('Гуголь', $client->getFirstVisitMarker());
        $this->assertSame('google', $client->getFirstVisitMarkerAlias());
        $this->assertSame('https://cloud.roistat.com/img/arrow-right.png', $client->getFirstVisitMarkerIcon());
        $this->assertSame('', $client->getFirstVisitMarkerAliasLevel_1());
        $this->assertSame(2, $client->getOrderCount());
        $this->assertSame(120, $client->getProfit());
        $this->assertSame(220, $client->getRevenue());

    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $handler = $this->_createMockResponse(['status' => 'success']);
        $this->_roistat->addMockHandler($handler);

        $request = [
            (new Entity\Client())->setId(1)->setName('Petya')->setPhone('79780000000')->setEmail('test@test.ru')->setCompany('roistat')->setBirthDate('1970-01-01')->setFields(['field' => 'value']),
        ];
        $response = (new Scheme\Client($this->_roistat))->create($request);
        $this->assertTrue($response);
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;

class OrderTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('OrderList'));
        $this->_roistat->addMockHandler($handler);
        $orders = $this->_roistat->Order()->items();
        $this->assertSame(1, count($orders));

        $order = $orders[0];
        $this->assertSame('29623075', $order->getId());
        $this->assertSame('2017-10-23T17:04:57+0000', $order->getCreationDate());
        $this->assertSame('2017-10-30T10:20:12+0000', $order->getUpdateDate());
        $this->assertSame('http://test.ru/order', $order->getUrl());
        $this->assertSame('standard', $order->getSourceType());
        $this->assertSame(2900, $order->getRevenue());
        $this->assertSame(1000, $order->getCost());
        $this->assertSame('9903324', $order->getClientId());
        $this->assertSame('1204', $order->getVisitId());
        $this->assertSame('http://domain.ru/', $order->getPage());
        $visit = $order->getVisit();
        $this->assertSame('1204', $visit->getId());
        $this->assertSame(':utm:google_cpc_cid|931442600|search_gid|44069316662|aid|223037388159|placement|', $visit->getSource()->getSystemName());
        $status = $order->getStatus();
        $this->assertSame('0', $status->getId());
        $this->assertSame('progress', $status->getType());
        $this->assertSame('Ожидание клиента', $status->getName());
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testExternalUrl() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('OrderExternalUrl'));
        $this->_roistat->addMockHandler($handler);
        $orderLink = $this->_roistat->Order()->externalUrl('123');
        $this->assertSame('http://new123qwerty.amocrm.ru/leads/detail/123', $orderLink);
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCustomFields() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('OrderCustomFields'));
        $this->_roistat->addMockHandler($handler);
        $customFields = $this->_roistat->Order()->customFields();
        $this->assertSame(['Город', 'Касса', 'Менеджер'], $customFields);
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testStatusUpdate() {
        $handler = $this->_createMockResponse(['status' => 'success']);
        $this->_roistat->addMockHandler($handler);
        $response = $this->_roistat->Order()->statusUpdate('123', '1');
        $this->assertTrue($response);
    }
}
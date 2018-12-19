<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Entity;
use Analytics\Scheme;

class OrderAddTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('OrderAdd'));
        $this->_roistat->api()->addMockHandler($handler);

        $request = [
            (new Entity\OrderAdd())->setId(1)->setName('test deal')->setDateCreate('2017-10-23T17:04:57+0000')->setStatus('0')->setRoistat('test')->setClientId('1')->setPrice('100')->setCost('50'),
        ];
        $response = (new Scheme\OrderAdd($this->_roistat))->create($request);
        $this->assertSame(2, $response->getProcessed());
        $this->assertSame(0, $response->getSkippedByStatus());
        $this->assertSame(0, $response->getSkippedByWaitingVisitInfo());
        $this->assertSame(0, $response->getSkippedByInternalError());
        $this->assertSame(0, $response->getSkippedBecauseNotChanged());
        $this->assertSame(0, $response->getSkippedByInvalidFormat());
        $this->assertSame(2, $response->getSaved());
        $this->assertSame('', $response->getComment());
        $this->assertSame(2, $response->getUploaded());
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Entity;

class StatusTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $handler = $this->_createMockResponse(['status' => 'success']);
        $this->_roistat->addMockHandler($handler);

        $request = [
            (new Entity\Status())->setId('1')->setName('Новый лид')->setType('in_progress'),
            (new Entity\Status())->setId('2')->setName('Оплачен')->setType('paid'),
        ];
        $response = $this->_roistat->Status()->create($request);
        $this->assertTrue($response);
    }
}
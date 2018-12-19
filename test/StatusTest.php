<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Entity;
use Analytics\Scheme;

class StatusTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $handler = $this->_createMockResponse(['status' => 'success']);
        $this->_roistat->api()->addMockHandler($handler);

        $request = [
            (new Entity\Status())->setId('1')->setName('Новый лид')->setType('in_progress'),
            (new Entity\Status())->setId('2')->setName('Оплачен')->setType('paid'),
        ];
        $response = (new Scheme\Status($this->_roistat))->create($request);
        $this->assertTrue($response);
    }
}
<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Calltracking;

use Analytics\Scheme;
use Analytics\Engine\Exception;

class PhoneTest extends \Test\AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/PhoneList')));
        $phones = (new Scheme\Calltracking\Phone($this->_roistat))->items();
        $this->assertSame(2, count($phones));

        $phone = $phones[0];
        $this->assertSame(4, $phone->getId());
        $this->assertSame('74951234567', $phone->getPhone());
        $this->assertSame('7495', $phone->getPrefix());
        $this->assertSame(10, $phone->getScriptId());
        $this->assertSame(0, $phone->getIsExternal());
        $this->assertSame('2016-10-10T08:50:44+0000', $phone->getCreationDate());
        $this->assertSame('2016-10-10T08:50:44+0000', $phone->getLastUseDate());
        $this->assertSame(0, $phone->getCallCount());
        $this->assertNotNull($phone->getScript());
    }
}
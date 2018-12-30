<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Calltracking;

use Analytics\Scheme;
use Analytics\Entity;

class PhoneTest extends \Test\AbstractTest {

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

    public function testBuy() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/PhoneBuy')));
        $phones = (new Scheme\Calltracking\Phone($this->_roistat))->buy('499', 1);
        $this->assertSame(1, count($phones));

        $phone = $phones[0];
        $this->assertSame(5, $phone->getId());
        $this->assertSame('74991234567', $phone->getPhone());
        $this->assertSame('7499', $phone->getPrefix());
        $this->assertSame(0, $phone->getIsExternal());
        $this->assertSame('2016-10-12T08:19:23+0000', $phone->getCreationDate());
        $this->assertSame(0, $phone->getCallCount());
        $this->assertNull($phone->getScriptId());
        $this->assertNull($phone->getLastUseDate());
        $this->assertNull($phone->getScript());
    }

    public function testCreate() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/PhoneCreate')));
        $phones = (new Scheme\Calltracking\Phone($this->_roistat))->create(['74951234567']);
        $this->assertSame(1, count($phones));

        $phone = $phones[0];
        $this->assertSame(5, $phone->getId());
        $this->assertSame('74951234567', $phone->getPhone());
        $this->assertSame(1, $phone->getIsExternal());
        $this->assertSame('2016-10-12T08:19:23+0000', $phone->getCreationDate());
    }

    public function testUpdate() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse(['status' => 'success']));

        $phone = (new Entity\Calltracking\Phone())
            ->setId(5)
            ->setScriptId(2)
            ->setLastUseDate('2016-10-11T21:00:00.000Z');
        $status = (new Scheme\Calltracking\Phone($this->_roistat))->update($phone);
        $this->assertTrue($status);
    }

    public function testDelete() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse(['status' => 'success']));
        $status = (new Scheme\Calltracking\Phone($this->_roistat))->delete(['74951234567']);
        $this->assertTrue($status);
    }

    public function testPhoneCodes() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/PhoneCodes')));
        $codes = (new Scheme\Calltracking\Phone($this->_roistat))->allowedPhoneCodes();
        $this->assertCount(2, $codes);

        $code = $codes[0];
        $this->assertSame('78362', $code->getSystemName());
        $this->assertSame('7 8362', $code->getDisplayName());
        $this->assertSame('Йошкар-Ола', $code->getCity());
        $this->assertSame(750, $code->getMonthPrice());
        $this->assertSame(1.4, $code->getMinutePrice());
    }
}